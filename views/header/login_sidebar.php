<nav class="amado-nav">
    <ul>
        <li class="<?php if ($this->uri->segment(1) == "account") echo "active";?>"><a href="<?=base_url()?>account">My Profile</a></li>
        <li class="<?php if ($this->uri->segment(1) == "myorder") echo "active";?>"><a href="<?=base_url()?>myorder">My Order</a></li>
        <li class="<?php if ($this->uri->segment(1) == "change-password") echo "active";?>"><a href="<?=base_url()?>change-password">Change Password</a></li>
        <li class="<?php if ($this->uri->segment(2) == "logout") echo "active";?>"><a href="<?=base_url()?>login/logout">Logout</a></li>
    </ul>
</nav>