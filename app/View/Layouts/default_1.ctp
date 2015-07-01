<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
        if (isset($keywords_for_layout)) {
            echo "<meta name='keywords' content='" . $keywords_for_layout . "' /> ";
        }
        if (isset($description_for_layout)) {
            echo "<meta name='description' content='" . $description_for_layout . "' />";
        }
        ?>
        <title>
            <?php
            if (isset($title_for_layout)) {
                echo $title_for_layout;
            }
            ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo $this->Html->css(array('styles')); ?>
        <?php echo $this->Html->script(array('jquery.min')); ?>
    </head>

    <body>
        <?php echo $this->element('header'); ?>
        <div id="wrapper_outer">
            <div id="wrapper">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="174" valign="top"><?php echo $this->element('left'); ?></td>
                        <td valign="top" style="background: #FFF;"><?php echo $content_for_layout ?></td>
                        <td width="174" valign="top"><?php echo $this->element('right'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php echo $this->element('footer'); ?>
    </body>
</html>