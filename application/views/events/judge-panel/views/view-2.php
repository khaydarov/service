<div class="content-wrapper">
	<div class="content-heading">
		<div class="col-sm-4 col-md-3 hidden-xs">
			<img src="<?=$assets; ?>img/temp/vesnavitmo.jpg" alt="EventImage" class="img-thumbnail img-circle">
		</div>
		<div class="col-sm-8 col-md-9 text-white text-left orgName">
			<h1><?=$event['title']; ?></h1>
		</div>
		<a href="<?=URL::site('auth/logout'); ?>" title="Выход" class="btn-logout">
			<em class="fa fa-sign-out logout-position"></em>
		</a>
	</div>
	<div class="col-xs-10 col-xs-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<form id="rating-area" action="#">
					<div>
						<input type="hidden" name="id_event" value="<?=$event['id']; ?>">
						<input type="hidden" name="id_judge" value="<?=Session::instance()->get('id_judge'); ?>">
						<?php
							for($i = 0; $i < count($stages); $i++):
								$criteria = Model_Stages::getCriteriasByStageId($stages[$i]['id']);
								$criteria = Arr::get($criteria, '0');
						?>
						<h3><?=$stages[$i]['name']; ?></h3>
						<div>
							<div class="col-md-12 ">
								<div class="alert description">
									<p><?=$criteria['name']; ?></p>
								</div>
							</div>

							<div id="stage-<?=($i+1); ?>" data-toggle="portlet" class="portlets-wrapper">
								<?php
										for($j = 0; $j < count($participants[$i]); $j++):
									?>
								<div id="partisipant-id-<?=($j+1);?>" class="panel panel-primary">
									<div class="panel-wrapper">
										<div class="panel-body">
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
												<img src="<?=URL::base(); ?>uploads/<?=$participants[$i][$j]['photo']; ?>" alt="Participant<?=$j;?>" class="pronwe_boxShadow pronwe_border-1px participant">
											</div>
											<div id="<?=$stages[$i]['id']; ?>" class="col-lg-9 col-md-9 col-sm-7 col-xs-12">
												<h2 id="<?=$participants[$i][$j]['id']; ?>"><?=$participants[$i][$j]['name'];?></h2>
												<div class="buttons" data-toggle="buttons">
													<?php for($k = 0; $k < $criteria['maxscore']; $k++):?>
													<button class="mb-sm btn btn-primary">
														<input type="radio" name="score-<?=($i+1); ?>-<?=($j+1);?>" autocomplete="off" value="<?=$k;?>"><?=$k;?>
													</button>
													<? endfor; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
		                     	<?php endfor; ?>
							</div>
						</div>
						<?php endfor; ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<button id="errorMsg" type="button" data-notify="" data-message="Вы забыли поставить балл участнику" data-options="{&quot;status&quot;:&quot;danger&quot;}" style="display: none;"></button>