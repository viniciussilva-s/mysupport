<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo htmlspecialchars( $config["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Funcionário</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">

                      <ol class="breadcrumb text-right">
                      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li><a href="/admin/users">Funcionários</a></li>
                      <li class="active"><a href="/admin/users/<?php echo htmlspecialchars( $config["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $config["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    </ol>
                    </div>
                </div>
            </div>
        </div>


<!-- Content Wrapper. Contains page content -->


<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/<?php echo htmlspecialchars( $config["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="row ">
            <div class="col-12 form-group">
              <label for="desname">Nome</label>
              <input type="text" class="form-control" id="desname" name="desname" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
            </div>
            <div class="col-12 form-group">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" value="<?php echo htmlspecialchars( $user["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  >
            </div>
            <div class="col-6 form-group">
              <label for="dtnasc">Nascimento</label>
               <input type="date" class="form-control" id="dtnasc" name="dtnasc" placeholder="Data de nascimento" value="<?php echo htmlspecialchars( $user["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
             </div>
             <div class="col-6 form-group">
              <label for="nrphone">Telefone</label>
              <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            </div>
            <div class="row">
              <div class="col-6 form-group">
                <label for="deslogin">Login</label>
                <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Digite o login" value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  >
              </div>
              
              <div class="col-4 form-group">
                <label for="desemail">E-mail</label>
                <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="col-2 form-group">
                <label for="despassword">Senha</label>
                <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Digite a senha" value="">
              </div>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="inadmin" value="1" <?php if( $user["inadmin"]==1 ){ ?>checked<?php } ?> > Acesso de Administrador
              </label>
            </div>
		
			
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success"><?php echo htmlspecialchars( $config["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->