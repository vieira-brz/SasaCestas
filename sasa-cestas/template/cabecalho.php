<!-- MOJS CONFIG -->
<script src="../plugins/node_modules/@mojs/core/dist/mo.umd.js"></script>
<script src="../js/mo.config.js"></script>
<script src="../js/address.js"></script>

<!-- CABECALHO -->
<header class="toolbar">

    <div class="tools">

        <?php if ($acesso != 'MASTER') { ?>
            <h3 class="address">Clique para adicionar um endereço &nbsp <i class="fas fa-chevron-down" style="margin-bottom:-.5%;"></i> </h3>
        <?php } else { ?>
            <h3 class="address"></h3>
        <?php } ?>

        <div class="dinamic-links">
            <a href="http://localhost/SasaCestas/sasa-cestas" class="container-link">
                <i class="fas fa-home"></i>
                <label>Início</label>
            </a>
            <?php if ($acesso == 'MASTER') { ?>
                <a href="http://localhost/SasaCestas/sasa-cestas/cestas" class="container-link">
                    <i class="fas fa-shopping-basket"></i>
                    <label>Cestas</label>
                </a>
            <?php } ?>
            <?php if ($acesso != 'MASTER') { ?>
                <a href="http://localhost/SasaCestas/sasa-cestas/historico" class="container-link">
                    <i class="fas fa-history"></i>
                    <label>Histórico</label>
                </a>
            <?php } ?>
            <a href="http://localhost/SasaCestas/sasa-cestas/pedidos" class="container-link">
                <i class="fas fa-list-alt"></i>
                <label>Pedidos</label>
            </a>
            <a href="http://localhost/SasaCestas/sasa-cestas/carrinho" class="container-link">
                <i class="fas fa-shopping-cart"></i>
                <label>Carrinho</label>
            </a>
        </div>

        <div class="relative-profile">
            <img class="profile" src="https://www.w3schools.com/w3images/avatar6.png" alt="foto-de-perfil">
        </div>
        
    </div>
    
    <!-- CONTAINER PERFIL -->
    <div class="container-profile-config-bg none">
        <div class="container-profile-config">
            <div class="profile-config-edit"> <img class="profile" src="https://www.w3schools.com/w3images/avatar6.png" alt="foto-de-perfil"> <i class="fas fa-camera"></i> </div>
            <h4 id="config-acc-name">NAME</h4>
            <p id="config-acc-email">exemplo@gmail.com</p>
            <button name="config-acc-gerenciar">Gerenciar sua Conta</button> 
            <hr>
            <!-- <button name="config-acc-stats">Estatísticas</button>  -->
            <!-- <hr> -->
            <div class="flex" style="justify-content: space-between;">
                <button name="config-acc-stats" style="margin: 20px 10px 20px 0 !important;">Estatísticas</button> 
                <button name="config-acc-logoff">Sair</button> 
            </div>
            <hr>
            <div class="slash-dark-mode">
                <input type="checkbox" name="checkbox-theme"> Modo escuro
            </div>
            <hr>
            <p>Todos os direitos reservados - 2021</p>
        </div>
    </div>
    
    <!-- CONTAINER ENDEREÇO -->
    <div class="container-config visible-config">
        <div class="config-tools-card"></div>
        <div class="config-tools-add">
            <button class="add-address-button" type="button" name="add-address">ADICIONAR ENDEREÇO &nbsp<i class="fas fa-plus"></i> </button>
        </div>
    </div>
    
</header>