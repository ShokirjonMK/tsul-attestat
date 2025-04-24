<div class="header-left">
    
    <div class="search-toggle-icon dw dw-search2">
        <h3 class="ml-5">
            TSUL
        </h3></div>
    <div class="header-search">
        
            <div class="form-group mb-0">
                <a href="<?php echo e(route('mk')); ?>"><h3>
                        TSUL attestation
                    </h3>
                </a>
                
            </div>
            
    </div>
</div>
<div class="header-right">
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
				<span class="user-icon">
					<img src="<?php echo e(asset('assets/tsul.png')); ?>" alt="">
				</span>
                <span class="user-name">
					TSUL_admin
				</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="<?php echo e(route('x')); ?>"><i class="icon-copy fi-graph-trend"></i> Profil</a>
                <?php if((Auth::user()->role == 111)): ?>
                <a class="dropdown-item" href="<?php echo e(route('users')); ?>"><i class="dw dw-settings2"></i> Foydalanuvchilar</a>
                <a class="dropdown-item" href="<?php echo e(route('mainquestions')); ?>"><i class="dw dw-settings2"></i> Umumiy savollar</a>
                <?php endif; ?>
<!--                <a class="dropdown-item" href="https://t.me/ShokirjonMK"><i class="dw dw-help"></i> Yordam</a>-->
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                    <i class="dw dw-logout"></i>
                    <?php echo e(__('Chiqish')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
    <div class="github-link">
        <a href="https://t.me/ShokirjonMK" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
    </div>
</div><?php /**PATH /var/www/attestat/resources/views/mk/includes/header.blade.php ENDPATH**/ ?>