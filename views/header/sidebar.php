<nav class="amado-nav">
    <ul>
        <li  class="<?php if ($this->uri->segment(1) == "shop") echo "active";?>"><a href="<?=base_url()?>shop">Shop</a></li>
        <li class="<?php if ($this->uri->segment(1) == "cart") echo "active";?>"><a href="<?=base_url()?>cart">Cart</a></li>
                   <?php
        if(!empty($this->cart->contents()))
        { 
        ?>
        <li class="<?php if ($this->uri->segment(1) == "checkout") echo "active";?>"><a href="<?=base_url()?>checkout">Checkout</a></li>
    <?php }
    ?>
    </ul>
</nav>