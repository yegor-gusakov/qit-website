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

class DUPX_Validation_test_disk_space extends DUPX_Validation_abstract_item
{
    private $freeSpace     = 0;
    private $archiveSize   = 0;
    private $extractedSize = 0;

    protected function runTest()
    {
        if (!function_exists('disk_free_space') || DUPX_InstallerState::isRecoveryMode()) {
            return self::LV_SKIP;
        }

        $this->freeSpace     = @disk_free_space(DUPX_Paramas_Manager::getInstance()->getValue(DUPX_Paramas_Manager::PARAM_PATH_NEW));
        $this->archiveSize   = DUPX_Conf_Utils::archiveExists() ? DUPX_Conf_Utils::archiveSize() : 1;
        $this->extractedSize = file_exists(DUPX_Package::getScanJsonPath()) ? DUPX_ArchiveConfig::getInstance()->getScanObj()->ARC->USize : 1;

        if ($this->freeSpace && $this->archiveSize > 0 && $this->freeSpace > ($this->extractedSize + $this->archiveSize)) {
            return self::LV_GOOD;
        } else {
            return self::LV_SOFT_WARNING;
        }
    }

    public function getTitle()
    {
        return 'Sufficient Disk Space';
    }

    protected function swarnContent()
    {
        return dupxTplRender('parts/validation/tests/diskspace', array(
            'freeSpace'     => DUPX_U::readableByteSize($this->freeSpace),
            'requiredSpace'   => DUPX_U::readableByteSize($this->archiveSize+$this->extractedSize),
            'isOk'          => false
        ), false);
    }

    protected function goodContent()
    {
        return dupxTplRender('parts/validation/tests/diskspace', array(
            'freeSpace'     => DUPX_U::readableByteSize($this->freeSpace),
            'requiredSpace'   => DUPX_U::readableByteSize($this->archiveSize+$this->extractedSize),
            'isOk'          => true
        ), false);
    }
}