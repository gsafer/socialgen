    <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Socialgen.com Beta</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <? $this->load->view('navapp/nav_messages'); ?>
        <? //$this->load->view('navapp/nav_task'); ?>
        <? $this->load->view('navapp/nav_notifications'); ?>
        <? $this->load->view('navapp/nav_user'); ?>
    </ul>
    <!-- /.navbar-top-links -->

    <? $this->load->view('menus/menu_ppal'); ?>
    <!-- /.navbar-static-side -->
</nav>