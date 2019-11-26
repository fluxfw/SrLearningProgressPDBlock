<#1>
<?php
\srag\Plugins\SrLearningProgressPDBlock\Config\Config::updateDB();
?>
<#2>
<?php
if (\srag\DIC\SrLearningProgressPDBlock\DICStatic::dic()->database()->tableExists(\srag\Plugins\SrLearningProgressPDBlock\Config\Config::TABLE_NAME_WRONG)) {
    \srag\DIC\SrLearningProgressPDBlock\DICStatic::dic()->database()->dropTable(\srag\Plugins\SrLearningProgressPDBlock\Config\Config::TABLE_NAME, false);

    \srag\DIC\SrLearningProgressPDBlock\DICStatic::dic()
        ->database()
        ->renameTable(\srag\Plugins\SrLearningProgressPDBlock\Config\Config::TABLE_NAME_WRONG, \srag\Plugins\SrLearningProgressPDBlock\Config\Config::TABLE_NAME);
} else {
    \srag\Plugins\SrLearningProgressPDBlock\Config\Config::updateDB();
}
?>
