<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

		<div class="clearfix"></div>
		<div class="page-header">
			<h3>Véhicule : <?php echo $vehicle['manufacturer_name']; ?> <?php echo $vehicle['model_name']; ?>  <a class="btn btn-primary" href="<?php echo base_url('admin/vehicles/'.$vehicle['v_id'].'/edit'); ?>">Editer</a></h3>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<ul class="list-group">
					<li class="list-group-item"><b class="col-sm-3">Marque :</b><span>&nbsp;<?php echo $vehicle['manufacturer_name']; ?></span></li>
					<li class="list-group-item"><b class="col-sm-3">Modèle :</b><span>&nbsp;<?php echo $vehicle['model_name']; ?></span></li>
					<li class="list-group-item"><b class="col-sm-3">Catégorie :</b><span>&nbsp;<?php echo $vehicle['category']; ?></span></li>
					<li class="list-group-item"><b class="col-sm-3">Transmission :</b><span>&nbsp;<?php echo $vehicle['gear']; ?></span></li>
					<li class="list-group-item"><b class="col-sm-3">Nombre de places :</b><span>&nbsp;<?php echo $vehicle['seats']; ?></span></li>
					<li class="list-group-item"><b class="col-sm-3">Kilométrage :</b><span>&nbsp;<?php echo $vehicle['mileage']; ?></span></li>
					<li class="list-group-item"><b class="col-sm-3">Immatriculation :</b><p>&nbsp;<?php echo $vehicle['engine_no']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Carte grise :</b><p>&nbsp;<?php echo $vehicle['chesis_no']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">N° assurance :</b><p>&nbsp;<?php echo $vehicle['insurance_id']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Assureur :</b><p>&nbsp;<?php echo $vehicle['insurer']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Date Assurance :</b><p>&nbsp;<?php echo $vehicle['insurance_date']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Date dernier contrôle :</b><p>&nbsp;<?php echo $vehicle['last_control_at']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Couleur :</b><p>&nbsp;<?php echo $vehicle['color']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Capacité du réservoir :</b><p>&nbsp;<?php echo $vehicle['tank']; ?></p></li>
					<li class="list-group-item"><b class="col-sm-3">Date ajout :</b><p>&nbsp;<?php echo $vehicle['add_date']; ?></p></li>
				</ul>
				
			</div>

			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Image</h3>
					</div>
					<div class="panel-body">
						<?php if ($vehicle['image']): ?>
							<img class="img-responsive img-thumbnail" src="<?php echo base_url('uploads') .'/'. $vehicle['image']; ?>">
						<?php else: ?>
							<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNjNlMDY3N2E3YyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2M2UwNjc3YTdjIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc0LjA1NDY4NzUiIHk9IjEwNC41Ij4yMDB4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true">
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Image chassis face</h3>
					</div>
					<div class="panel-body">
						<?php if ($vehicle['front_frame_image']): ?>
							<img class="img-responsive img-thumbnail" src="<?php echo base_url('uploads') .'/'. $vehicle['front_frame_image']; ?>">
						<?php else: ?>
							<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNjNlMDY3N2E3YyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2M2UwNjc3YTdjIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc0LjA1NDY4NzUiIHk9IjEwNC41Ij4yMDB4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true">
						<?php endif; ?>
					</div>
				</div>

			</div>

			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Image chassis arrière</h3>
					</div>
					<div class="panel-body">
						<?php if ($vehicle['front_frame_image']): ?>
							<img class="img-responsive img-thumbnail" src="<?php echo base_url('uploads') .'/'. $vehicle['front_frame_image']; ?>">
						<?php else: ?>
							<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNjNlMDY3N2E3YyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2M2UwNjc3YTdjIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc0LjA1NDY4NzUiIHk9IjEwNC41Ij4yMDB4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>