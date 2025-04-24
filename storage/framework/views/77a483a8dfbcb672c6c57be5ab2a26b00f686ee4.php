<div class="header-left">
	
	<div class="search-toggle-icon dw dw-search2">
				<h3 class="ml-5">
					TSUL
				</h3></div>
	<div class="header-search">
		
			<div class="form-group mb-0">
				<h3>
					TSUL attestation
				</h3>
				
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
					<?php echo e(Auth::user()->username); ?>

				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
				<a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profil</a>
				<a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Sozlamalar</a>
				<a class="dropdown-item" href="#"><i class="dw dw-help"></i> Yordam</a>
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
</div><?php /**PATH D:\tsul\tsul-attestation\resources\views/mk/includes/header.blade.php ENDPATH**/ ?>