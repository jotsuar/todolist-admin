
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title_for_layout; ?> - <?php echo Configure::read('Application.name') ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <?php echo $this->Html->css('font-awesome-4.7.0/css/font-awesome.min.css'); ?>
        <?php echo $this->Html->css("theme/bootstrap/css/bootstrap.min.css"); ?>
        <?php echo $this->Html->css("theme/skins/_all-skins.min.css"); ?>
        <?php echo $this->Html->css("theme/AdminLTE.min.css"); ?>
        <?php echo $this->Html->css("theme/datatables/dataTables.bootstrap.css"); ?>
        <?php echo $this->Html->css("theme/datatables/dataTables.bootstrap.css"); ?>
        <?php echo $this->Html->css("style"); ?>
        <?php echo $this->Html->script("theme/plugins/jQuery/jquery-2.2.3.min.js"); ?>
        <?php echo $this->Html->script("theme/bootstrap/js/bootstrap.min.js"); ?>
        <?php echo $this->Html->script("lib/bootbox.min.js"); ?>
        <?php echo $this->Html->script("app.js"); ?>
    </head>
    <body class="skin-blue sidebar-mini layout-top-nav">
        <div class="wrapper">
            <div class="content-wrapper">
              <section class="content">
                <?php 
                  echo $this->Session->flash(); 
                  echo $this->fetch('content'); 
                ?>
              </section>
            </div>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href=""><?php echo Configure::read('Application.name') ?></a>.</strong> All rights
            reserved.
        </footer>
    </body>
    <?php  echo $this->Html->script("theme/dist/js/demo.js"); ?>
    <?php  echo $this->Html->script("theme/dist/js/app.min.js"); ?>
</html>