            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Gestión de Crédito</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a  href="{{URL::action('calcularCreditoController@create')}}"><i class="fa fa-circle-o"></i> Calcular Crédito</a></li>
              </ul>
            </li>

            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i> 
                <span>Interés</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('TasaInteresController@index')}}"><i class="fa fa-circle-o"></i> Tasas de interés</a></li>
              </ul>
            </li>



            <li class="treeview">
              <a href="{{URL::action('UsuarioController@index')}}">
                <i class="fa fa-users"></i> 
                <span>Gestión de Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a  href="{{URL::action('UsuarioController@index')}}"><i class="fa fa-circle-o"></i> Listado</a></li>
              </ul>
            </li>