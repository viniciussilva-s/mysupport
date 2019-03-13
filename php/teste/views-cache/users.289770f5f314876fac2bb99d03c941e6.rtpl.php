<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Funcionários</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">

                      <ol class="breadcrumb text-right">
                      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active"><a href="/admin/users">Funcionários</a></li>
                    </ol>
                    </div>
                </div>
            </div>
        </div>

<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="row col-lg-12">
                           <div class="col-lg-10 ">
                             <a href="/admin/users/create" class="btn btn-success">Cadastrar funcionário </a>
                            </div>   
                             <div class="col-lg-2 ">
                              <form action="/admin/users">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                  <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                  </div>
                                </div>
                              </form>
                              </div>
                          </div>    
                        </div>
                            
                        
                        <div class="card-body">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Nome</th>
                                  <th>E-mail</th>
                                  <th>Nascimento</th>
                                  <th>Telefone</th>
                                  <th style="width: 40px">Admin</th>
                                  <th style="width: 180px">&nbsp;</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                                <tr>
                                  <td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                  <td><?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                  <td><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                  <td><?php echo htmlspecialchars( $value1["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                                  <td><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>  
                                  <td><?php if( $value1["inadmin"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                                  <td>
                                    <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                     <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>

                      <div class="col-sm-12 col-md-7 float-right">
                            <div class="dataTables_paginate paging_simple_numbers float-right" id="bootstrap-data-table_paginate">
                              <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous">
                                  <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">
                                    Previous
                                  </a>
                                </li>
                              <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                                <li class="paginate_button page-item active">
                                  <a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-controls="bootstrap-data-table" data-dt-idx="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" tabindex="0" class="page-link"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                  </a>
                                </li>
                               <?php } ?>
                                <li class="paginate_button page-item next" id="bootstrap-data-table_next">
                                  <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="7" tabindex="0" class="page-link">
                                    Next
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
<!-- /.box-body -->
              <!-- <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
                          </div> -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
