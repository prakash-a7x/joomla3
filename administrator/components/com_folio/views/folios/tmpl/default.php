<?php

use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
defined('_JEXEC') or die;
$listOrder  = '';
$listDirn  = '';
?>
<form action="<?php echo Route::_('index.php?option=com_folio&view=folios'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="j-main-container" class="span10">
        <div class="clearfix"> </div>
        <table class="table table-striped" id="folioList">
            <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <input type="checkbox" name="checkall-toggle" value="" title="<?php echo Text::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                    </th>
                    <th class="title">
                        <?php echo HTMLHelper::_(
                            'grid.sort',
                            'JGLOBAL_TITLE',
                            'a.title',
                            $listDirn,
                            $listOrder
                        ); ?>
                    </th>
                    <th class="alias">
                        <?php echo HTMLHelper::_(
                            'grid.sort',
                            'COM_FOLIO_MANAGER_ALIAS',
                            'a.alias',
                            $listDirn,
                            $listOrder
                        ); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $i => $item) :
                ?>
                    <tr class="row<?php echo $i % 2; ?>">
                        <td class="center hidden-phone">
                            <?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td class="nowrap has-context">
                            <a href="<?php echo Route::_('index.php?option=com_folio&task=folio.edit&id=' . (int) $item->id); ?>">
                                <?php echo $this->escape($item->title); ?>
                            </a>
                        </td>
                        <td class="nowrap has-context">
                            <?php echo $this->escape($item->alias); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo HTMLHelper::_('form.token'); ?>
    </div>
</form>