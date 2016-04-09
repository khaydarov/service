<?php
?>

	<link rel="stylesheet" href="<?=$assets; ?>css/table-my-event.css">
	
	<!-- DATATABLES-->
	<link rel="stylesheet" href="<?=$assets; ?>vendor/datatables/media/css/jquery.dataTables.css">
	<script src="<?=$assets; ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
	<script src="<?=$assets; ?>vendor/datatables/media/plugins/date-de.js"></script>
	<script src="<?=$assets; ?>vendor/datatable-bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="<?=$assets; ?>js/myevent.js"></script>


<section>
	<div class="content-wrapper">
		<h3>Мои мероприятия
			<small>Здесь Вы можете реактировать мероприятие, создать панель для Жюри, где они будут выставлять оценки, создать приветственную страницу Вашего мероприятия, а также удалить мероприятие</small>
		</h3>
		<div class="panel panel-default">
			<div class="panel-body">
			<!--выводим не более 5 мероприятий в таблице-->
				<table id="table-my-event" class="table table-bordered table-striped table-hover" cellspacing="0">
					<thead>
						<tr>
							<th class="sorting text-center" style="width: 5%">#</th>
							<th class="no-sort text-center" style="width: 5%">Логотип</th>
							<th class="sorting" >Название мероприятия</th>
							<th class="no-sort" style="width: 15%">Дата начала</th>
							<th class="no-sort text-center" style="width: 15%">Редактирование</th>
							<th class="no-sort text-center" style="width: 15%">Управление</th>
							<th class="no-sort text-center" style="width: 5%">Удаление</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i = 0; $i < count($events); $i++): ?>
						<tr id="event_<?=$events[$i]['id']; ?>">
							<td class="text-center"><?=$i; ?></td>
							<td>
								<div class="media">
									<img src="<?=URL::base(); ?>uploads/<?=$events[$i]['photo']; ?>" alt="Image" class="img-responsive img-circle">
								</div>
							</td>
							<td><?=$events[$i]['title'] ;?></td>
							<td><?=$events[$i]['start_datetime'] ;?></td>
							<td>
								<div class="col-xs-4 text-center">
									<a href="<?=URL::base(). 'events/'. $events[$i]['id']. '/edit/'; ?>" data-toggle="tooltip" data-title="Редактирование информации о мероприятии">
										<em class="fa fa-edit icon-edit"></em>
									</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="<?=URL::base(). 'events/'. $events[$i]['id']. '/judgepanel'. $events[$i]['type']; ?>" data-toggle="tooltip" data-title="Настройка панели жюри">
										<em class="fa fa-user icon-edit"></em>
									</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#1" data-toggle="tooltip" data-title="Настройка приветственной страницы мероприятия">
										<em class="fa fa-users icon-edit"></em>
									</a>
								</div>
							</td>
							<td>
								<div class="col-xs-4 text-center">
									<div data-label="50%" class="radial-bar radial-bar-50 radial-bar-xs"></div>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#" data-toggle="tooltip" data-title="Опубликовать мероприятие">
										<em class="fa fa-share-alt icon-publish-no"></em>
									</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="<?=URL::base(). 'events/'. $events[$i]['id']. '/eventmaker/'; ?>" data-toggle="tooltip" data-title="Панель организатора">
										<em class="fa fa-table icon-organel"></em>
									</a>
								</div>
							</td>
							<td class="text-center">
								<a id="deleteEvent" href="#">
									<em class="fa fa-remove icon-remove"></em>
								</a>
							</td>
						</tr>
						<tr>
					<?php endfor; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>