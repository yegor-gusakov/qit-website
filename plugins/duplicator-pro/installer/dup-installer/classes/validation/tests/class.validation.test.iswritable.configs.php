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

class DUPX_Validation_test_iswritable_configs extends DUPX_Validation_abstract_item
{

    protected $configsCheck           = array(
        'wpconfig' => false,
        'htaccess' => false,
        'other'    => false
    );
    protected $notWritableConfigsList = array();

    /**
     *
     * @var string 
     */
    protected function runTest()
    {
        $this->configsCheck = self::configsWritableChecks();

        foreach ($this->configsCheck as $check) {
            if ($check === false) {
                return self::LV_HARD_WARNING;
            }
        }

        return self::LV_PASS;
    }

    /**
     * try to set wigth config permission and check if configs files are writeable
     * 
     * @return array
     */
    public static function configsWritableChecks()
    {
        $result   = array();
        $homePath = DUPX_Paramas_Manager::getInstance()->getValue(DUPX_Paramas_Manager::PARAM_PATH_NEW);

        if (DupProSnapLibIOU::chmod($homePath, 'u+rwx') === false) {
            $result['wpconfig'] = false;
            $result['htaccess'] = false;
            $result['other']    = false;
        } else {
            $configFile = $homePath.'/wp-config.php';
            if (file_exists($configFile)) {
                $result['wpconfig'] = DupProSnapLibIOU::chmod($configFile, 'u+rw');
            } else {
                $result['wpconfig'] = true;
            }

            $configFile = $homePath.'/.htaccess';
            if (file_exists($configFile)) {
                $result['htaccess'] = DupProSnapLibIOU::chmod($configFile, 'u+rw');
            } else {
                $result['htaccess'] = true;
            }

            $result['other'] = true;
            $configFile      = $homePath.'/web.config';
            if (file_exists($configFile) && DupProSnapLibIOU::chmod($configFile, 'u+rw') == false) {
                $result['other'] = false;
            }

            $configFile = $homePath.'/.user.ini';
            if (file_exists($configFile) && DupProSnapLibIOU::chmod($configFile, 'u+rw') == false) {
                $result['other'] = false;
            }

            $configFile = $homePath.'/php.ini';
            if (file_exists($configFile) && DupProSnapLibIOU::chmod($configFile, 'u+rw') == false) {
                $result['other'] = false;
            }
        }

        return $result;
    }

    public function getTitle()
    {
        return 'Configs files permissions';
    }

    protected function hwarnContent()
    {
        return dupxTplRender('parts/validation/tests/configs-is-writable', array(
            'testResult'   => $this->testResult,
            'configsCheck' => $this->configsCheck
            ), false);
    }

    protected function swarnContent()
    {
        return $this->hwarnContent();
    }

    protected function passContent()
    {
        return $this->hwarnContent();
    }
}