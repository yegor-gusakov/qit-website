<?php
/**
 * Validation object
 *
 * Standard: PSR-2
 * @link http://www.php-fig.org/psr/psr-2 Full Documentation
 *
 * @package SC\DUPX\U
 *
 */
defined('ABSPATH') || defined('DUPXABSPATH') || exit;

class DUPX_Validation_test_replace_paths extends DUPX_Validation_abstract_item
{

    protected $message = '';

    protected function runTest()
    {
        if (DUPX_Paramas_Manager::getInstance()->getValue(DUPX_Paramas_Manager::PARAM_REPLACE_ENGINE) === DUPX_S3_Funcs::MODE_SKIP ||
            DUPX_Paramas_Manager::getInstance()->getValue(DUPX_Paramas_Manager::PARAM_SKIP_PATH_REPLACE) === false) {
            return self::LV_SKIP;
        }


        $archivePaths = DUPX_ArchiveConfig::getInstance()->getRealValue("archivePaths");
        if (strlen($archivePaths->home) == 0) {
            $this->message = "It was found that the home path of the source was equal to '/'. In this case it's".
                " impossible to automatically replace paths, because of that path replacements have been disabled.";
        }

        return self::LV_HARD_WARNING;
    }

    public function getTitle()
    {
        return 'Replace PATHs in database';
    }

    protected function hwarnContent()
    {
        return dupxTplRender('parts/validation/tests/replace-paths',
            array(
                "message" => $this->message,
                "isOk"    => false
            ), false);
    }
}