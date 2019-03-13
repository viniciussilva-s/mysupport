<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo htmlspecialchars( $config["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?> usuário</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">

                      <ol class="breadcrumb text-right">
                      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active"><a href="/admin/clients">usuário</a></li>
                    </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 ">
        	<!-- Main content -->
        	<div class="card">
        		<!-- form start -->
        		<form role="form" action="/admin/clients/<?php echo htmlspecialchars( $config["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
        			<div class="card-body">
        				<div class="basicdataclient clearflix ">
        					<div class="row">
        						<div class="col-lg-12">
        							<div class="col-lg-10">
        								<h4>Dados Pessoais </h4>
        							</div>          
        						</div>
        					</div>
        					<hr>
        					<div class="row col-lg-12"> 
        						<div class="col-lg-4 form-group">
        							<label for="desname">Identificação</label> <label class="campObrig">*</label>
        							<input type="text" class="form-control" id="desname" name="desname" placeholder="Digite o nome complemento" value='<?php echo htmlspecialchars( $client["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' required>
        						</div>
        						<div class="col-lg-4 form-group">
        							<label for="cpf">Primeiro: (opcional)</label>
        							<input type="text" class="form-control rg-mask" id="cpf" name="cpf" placeholder="Digite o registro de nascimento" value="<?php echo htmlspecialchars( $client["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        						</div>
        						<div class="col-lg-4 form-group formneworder">
        							<label for="cpf">Segundo: (opcional)</label>
        							<input type="text" class="form-control cpf-mask" id="cpf" name="cpf" placeholder="Cadastro de pessoa física" value="<?php echo htmlspecialchars( $client["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        						</div>
        					</div>
                            <div class="row col-lg-12"> 
                                <div class="col-lg-4 form-group">
                                    <label for="desname">IP principal</label> <label class="campObrig">*</label>
                                    <input type="text" class="form-control" id="desname" name="desname" placeholder="Digite o nome complemento" value='<?php echo htmlspecialchars( $client["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' required>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="cpf">Homologação</label>
                                    <input type="text" class="form-control rg-mask" id="cpf" name="cpf" placeholder="Digite o registro de nascimento" value="<?php echo htmlspecialchars( $client["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                                <div class="col-lg-4 form-group formneworder">
                                    <label for="cpf">Secundário</label>
                                    <input type="text" class="form-control cpf-mask" id="cpf" name="cpf" placeholder="Cadastro de pessoa física" value="<?php echo htmlspecialchars( $client["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>
        					<div class="row col-lg-12">
        						<div class="col-lg-4 form-group">
                                    <label for="dtnasc">Inicio de contrato</label>
                                    <input type="text" class="form-control date-mask" id="dtnasc" name="dtnasc" placeholder="Data de nascimento" value="<?php echo htmlspecialchars( $client["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                                <div class="col-lg-4 form-group">
        							<label for="dtnasc">Data de expiração</label>
        							<input type="text" class="form-control date-mask" id="dtnasc" name="dtnasc" placeholder="Data de nascimento" value="<?php echo htmlspecialchars( $client["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        						</div>
        						
        						<div class="col-lg-4 form-group">
        							<label for="desphone">Chave de autentificação</label>
        							<input type="text" class="form-control cel-mask" id="desphone" name="desphone" placeholder="Digite o telefone" value="">
        						</div>
        					</div>
        				</div>  
        				<div class="configdateandress clearflix">
        					<h4>Endereço</h4>
        					<hr>
        					<?php if( $client["indesaddress"]!=1 ){ ?> 
                            <a class="btnshowfields" id="btnshowaddress" href="#" data-toggle="address">Adicionar endereço</a> 
                            <div id="dateclientaddress" style="display:none ;">                

        					<?php } ?>
        					
        					
        						<input type="checkbox" id="indesaddress" class="form-control"  name="indesaddress" style="display: none" <?php if( $client["indesaddress"]==1 ){ ?> checked="true" <?php }else{ ?> checked="false" <?php } ?> > 
        						<div class="row col-lg-12" > 
        							<div class="col-lg-4">
        								<label for="desaddress">CEP:</label>
        								<div id="inputzipcode" class="form-group">
        									<div class="input-group  " style="">
        										<input type="text"  id="deszipcode" name="deszipcode" class="form-control pull-right deszipcode cep-mask" placeholder="Pesquisar por CEP"  value="<?php echo htmlspecialchars( $client["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
        										<div class="input-group-btn">
        											<a href="#" id="btnzipcode" class="btn btn-default " style="background: #2980b9;"><i class="fa fa-search" ></i></a>
        										</div>
        									</div>
        								</div>          
        							</div>
        							<div class="col-lg-5 form-group">
        								<label for="desaddress">Lougradouro: </label>
        								<input type="text" class="form-control" id="desaddress" name="desaddress" placeholder="Endereço av., travessa, rua etc.." value='<?php echo htmlspecialchars( $client["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'>
        							</div>
        							<div class="col-lg-2 form-group">
        								<label for="desnumber">Número:</label>
        								<input type="number" class="form-control" id="desnumber" name="desnumber" placeholder="Digite o número" value="<?php echo htmlspecialchars( $client["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        							</div> 
                                    <div class="col form-group float-right" style="text-align:right;">
                                        <a class="btnhiddenfields" id="btnhiddenaddress" href="#" data-toggle="address" >x</a> 
                                    </div>									
        							
        						</div>

        						<div class="row col-lg-12">
        							<div class="col-lg-4 form-group">
        								<label for="descomplement">Complemento:</label>
        								<input type="text" class="form-control" id="descomplement" name="descomplement" placeholder="Complemento Ap., Bloco, Torre" value='<?php echo htmlspecialchars( $client["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'>
        							</div>
        							<div class="col-lg-3 form-group">
        								<label for="desdistrict">Bairro:</label>
        								<input type="text" class="form-control" id="desdistrict" name="desdistrict" placeholder="Bairro" value='<?php echo htmlspecialchars( $client["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'>
        							</div>
        							<div class="col-lg-3 form-group">
        								<label for="descity">Cidade:</label>
        								<input type="text" class="form-control" id="descity" name="descity" placeholder="Cidade" value='<?php echo htmlspecialchars( $client["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'>
        							</div>
        							<div class="col-lg-2 form-group">
        								<label for="desstate">UF:</label>
        								<input type="text" class="form-control desstate-mask" id="desstate" name="desstate" placeholder="Estado" value="<?php echo htmlspecialchars( $client["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        							</div>
        						</div>
        					<?php if( $client["indesaddress"]!=1 ){ ?> </div><?php } ?>
        				</div>
                            <hr>

                            
                            <div class="row col-lg-12 " style="text-align: center;margin-bottom: 12px"> 
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i> Cancelar</a>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa  fa-floppy-o"></i>  <?php echo htmlspecialchars( $config["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </button>
                                </div>

                            </div>
                        </form>
                    </div><!--  card-body -->

        	</div><!--  card -->  
		</div><!--  col -->  
