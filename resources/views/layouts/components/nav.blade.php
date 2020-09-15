<nav id="sidebar" class="px-0 bg-dark bg-gradient sidebar">
	<ul class="nav nav-pills flex-column">
		<li class="logo-nav-item">
			<a class="navbar-brand" href="#">
				<img src="assets/img/logo-white.png" width="145" height="32.3" alt="QuillPro">
			</a>
		</li>
		<li>
			<h6 class="nav-header">General</h6>
		</li>
		<li class="nav-item">
			
			<router-link class="nav-link" to="/">
				<i class="batch-icon batch-icon-browser-alt"></i>
						Dashboard <span class="sr-only">(current)</span>
			</router-link>
		</li>
		<li class="nav-item">
			<router-link class="nav-link" :to="{name: 'Camera'}">
						<i class="batch-icon fa fa-camera"></i> Camera
					</router-link>
		</li>
	</ul>

	<ul class="nav nav-pills flex-column">
		<li>
			<h6 class="nav-header">Components</h6>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-parent">
				<i class="batch-icon fa fa-car"></i>
				Vehicle
			</a>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'VehicleList'}">
						<i class="batch-icon batch-icon-menu"></i> List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'VehicleAdd'}">
						<i class="batch-icon batch-icon-add"></i>Register
					</router-link>		
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-parent">
				<i class="batch-icon batch-icon-user-card"></i>
				License
			</a>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'LicenseList'}">
						<i class="batch-icon batch-icon-menu"></i> List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'LicenseAdd'}">
						<i class="batch-icon batch-icon-add"></i>Register
					</router-link>		
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-parent">
				<i class="batch-icon fa fa-ticket"></i>
				Violations
			</a>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'ViolationList'}">
						<i class="batch-icon batch-icon-menu"></i> List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'ViolationAdd'}">
						<i class="batch-icon batch-icon-add"></i>Add
					</router-link>		
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-parent">
				<i class="batch-icon fa fa-ban"></i>
				Violators
			</a>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'ViolatorList'}">
						<i class="batch-icon batch-icon-menu"></i> List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'ViolatorScannedList'}">
						<i class="batch-icon batch-icon-menu"></i> Scanned List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'ViolatornAdd'}">
						<i class="batch-icon batch-icon-add"></i>Add
					</router-link>		
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-parent">
				<i class="batch-icon batch-icon-user-card"></i>
				Missing Vehicle
			</a>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'MissingList'}">
						<i class="batch-icon batch-icon-menu"></i> Missing List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'MissingFoundList'}">
						<i class="batch-icon batch-icon-menu"></i> Found List
					</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" :to="{name: 'MissingAdd'}">
						<i class="batch-icon batch-icon-add"></i>Add
					</router-link>		
				</li>
			</ul>
		</li>
	</ul>
</nav>