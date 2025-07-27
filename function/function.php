<?php

	include "connect.php";

	//вывод личной информации пользователя
		function GetProfile($login){

			global $connect;

			$sql= sprintf("SELECT `surname`, `name` FROM `users` WHERE `login` = '%s'",$login);
			
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}

			$row=$result->fetch_assoc();
			$data=sprintf('<p><span class="fw-semibold">Фамилия:</span> %s</p>
	                <p><span class="fw-semibold">Имя:</span> %s</p>'
	                ,$row['surname'], $row['name']);
		
			return $data;
		}

	//вывод истории записей пользователя
		function GetProfileReservation($login){
			global $connect;

			$select=sprintf("SELECT `user_id` FROM `users` WHERE `login`='%s'",$login);
			$select_result=$connect->query($select);
			$select_row=$select_result->fetch_assoc();
			$id=$select_row['user_id'];

			$sql= sprintf("SELECT `reservation_id`,`day`,`time`,`status` FROM `reservation` INNER JOIN `users` USING(`user_id`) WHERE `reservation`.`user_id`='%s' ORDER BY `reservation_id` DESC",$id);

			if(!$result=$connect->query($sql)){
				echo "Ошика получения данных";
			}

	        $data = '';

	        if ($result->num_rows > 0) {
	            while ($row = $result->fetch_assoc()) {
	                
	                $class= 'card p-2 g-3';

	                if ($row['status'] == 'Подтвержден') {
	                    $class = 'card text-success p-2 g-3';
	                } elseif ($row['status'] == 'Отменен') {
	                    $class = 'card text-body-tertiary p-2 g-3';
	                }

	                $data .= sprintf('<div class="col">
										<div class="%s">
											<div class="card-body">
												<h5 class="card-title">Запись %s</h5>
												<p class="mb-1"><span class="fw-semibold">Дата:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Время:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Статус: </span> %s</p>
											</div>
										</div>
									</div>',$class, $row['reservation_id'], $row['day'], $row['time'], $row['status']);
	            }
	        } else{
	        	$data .= '<p>Нет записей</p>';
	        }
	        return $data;
		}

	//обновление записей
		function GetUpdateReservation(){
			global $connect;

			$sql="SELECT `reservation_id`,`day`,`time`,`status`,`message`,`users`.`user_id` AS `user_id` FROM `reservation` INNER JOIN `users` USING(`user_id`) WHERE `reservation`.`user_id` ORDER BY `reservation_id` DESC";
			
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}

			$d='';
			$b='';
			$data='';

			while ($row=$result->fetch_assoc()) {

				$d = "card";
	            $b = sprintf('<div class="d-flex justify-content-end">
	                <a href="../controller/up-reservation.php?id=%s&action=success" class="card-link btn btn-outline-success m-1 mb-3 mt-3 shadow-sm p-2 rounded fw-bold">Подтвердить</a>
	                <a href="../controller/up-reservation.php?id=%s&action=cancel" class="card-link btn btn-outline-danger m-1 mb-3 mt-3 shadow-sm p-2 rounded fw-bold m-0 ">Отменить</a>
	                </div>',$row['reservation_id'],$row['reservation_id']);

				if ($row['status'] == 'Подтвержден') {
	                    $d = "card text-success";
	                    $b = '';
	                } elseif ($row['status'] == 'Отменен') {
	                    $d = "card text-body-tertiary";
	                    $b = '';
	                }

	                $data .= sprintf('<div class="col">
										<div class="%s p-2 g-3">
											<div class="card-body">
												<h5 class="card-title">Запись %s</h5>
												<p class="mb-1"><span class="fw-semibold">ID пользователя: </span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Дата:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Время:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Статус: </span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Комментарий: </span>%s</p>
												%s
											</div>
										</div>
									</div>
											',$d, $row['reservation_id'],  $row['user_id'],$row['day'], $row['time'], $row['status'], $row['message'], $b);
	            }
			return $data;
		}

	//статистика музея (кол полз. и активных полз.)
		function GetUsers(){

			global $connect;

			$sql= sprintf("SELECT COUNT(*) AS 'users' FROM `users` WHERE `role`='Пользователь'");
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}

			$row=$result->fetch_assoc();
			$data=sprintf(' %s',$row['users']);
			return $data;
		}
		
		function GetActivUsers(){
			global $connect;

			$sql=sprintf("SELECT COUNT(DISTINCT `user_id`) AS `users` FROM `activ-event`");
			if (!$result=$connect->query($sql)) {
				echo "Ошибка получения данных";
			}

			$row=$result->fetch_assoc();
			$data=sprintf('%s',$row['users']);
			return $data;
		}

	//обновление мероприятий
		function GetUpdateEvents(){
			global $connect;

			$sql="SELECT `event_id`,`name`,`date`,`status`,`description` FROM `events` ORDER BY `event_id` DESC";
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}

			$data="";
			while ($row=$result->fetch_assoc()) {
				if($row['status']=='Активен'){
					$data.= sprintf('<div class="col">
										<div class="card border-success p-2 g-3">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between">
	                                       			<h5 class="card-title">%s</h5>
	                                        	</div>
												<p class="mb-1"><span class="fw-semibold">ID:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Дата:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Статус: </span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Описание: </span>%s</p>
												<div class="mt-3">
													<a type="submit" class="card-link btn btn-outline-dark shadow-sm rounded fw-bold mb-1" data-bs-toggle="modal"
									                      data-bs-target="#exampleModalDefault">
									                      Настроить
									                </a>
													<a href="../controller/update-event.php?id=%s&action=cancel" class="card-link btn btn-outline-info shadow-sm rounded fw-bold mb-1">Отменить</a>
													<a href="../controller/update-event.php?id=%s&action=delet" class="card-link btn btn-outline-danger shadow-sm rounded fw-bold mb-1">Удалить</a>
												</div>
											</div>
										</div>
										</div>', $row['name'],$row['event_id'], $row['date'],  $row['status'], $row['description'],$row['event_id'],$row['event_id']);
				}elseif ($row['status']=='Скоро') {
					$data.= sprintf('<div class="col">
										<div class="card border-info g-3 p-2">
											<div class="card-body">
	                                       		<h5 class="card-title">%s</h5>
												<p class="mb-1"><span class="fw-semibold">ID:</span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Статус: </span> %s</p>
												<p class="mb-1"><span class="fw-semibold">Описание: </span>%s</p>
												<div class="mt-3">
													<a type="submit" class="card-link btn btn-outline-dark shadow-sm rounded fw-bold mb-1" data-bs-toggle="modal"
								                      data-bs-target="#exampleModalDefault">
								                      Настроить
								                    </a>
													<a href="../controller/update-event.php?id=%s&action=delet" class="card-link btn btn-outline-danger shadow-sm rounded fw-bold mb-1">Удалить</a>
												</div>
											</div>
										</div>
									</div>', $row['name'],$row['event_id'], $row['status'], $row['description'],$row['event_id']);
				}else{
					$data.= sprintf('<div class="col">
												<div class="card g-3 p-2">
													<div class="card-body">
	                                       				<h5 class="card-title">%s</h5>
														<p class="mb-1"><span class="fw-semibold">ID:</span> %s</p>
														<p class="mb-1"><span class="fw-semibold">Дата:</span> %s</p>
														<p class="mb-1"><span class="fw-semibold">Статус: </span> %s</p>
														<p class="mb-1"><span class="fw-semibold">Описание: </span>%s</p>
														<div class="mt-3">
															<a type="submit" class="card-link btn btn-outline-dark shadow-sm rounded fw-bold mb-1" data-bs-toggle="modal"
											                      data-bs-target="#exampleModalDefault">
											                      Настроить
											                </a>
															<a href="../controller/update-event.php?id=%s&action=delet" class="card-link btn btn-outline-danger shadow-sm rounded fw-bold mb-1">Удалить</a>
														</div>
													</div>
												</div>
									</div>', $row['name'],$row['event_id'], $row['date'], $row['status'], $row['description'],$row['event_id']);
				}
			}
			return $data;
		}

	//активные меропрития
		function GetActivEvent(){
			global $connect;
			$sql= sprintf("SELECT `event_id`,`name`, `date`,`description`, `status`,`img` FROM `events`");
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}
			
			$data="";
			while($row=$result->fetch_assoc()){
			if($row['status']=='Активен'){
					$data .=sprintf('<div class="colomn">
								<div class="card-body text-center">
										<img class="bd-placeholder-img rounded-circle mb-3" width="200" height="200" src="../img/events/'.htmlspecialchars($row['img']).'">
										<h5 class="card-title">%s</h5>
										<p class="mb-1">%s</p>
										<p class="mb-1">%s</p>
										<div class="d-flex justify-content-center">
											<a href="../controller/participate.php?id=%s" class="btn btn-sm btn-outline-success mt-2 fw-semibold">Участвовать</a>
										</div>
								</div>
							</div>',$row['name'], $row['date'], $row['description'],$row['event_id']);
						}
					}
			return $data;
		}

	//активные меропрития главной страницы
		function GetIndexEvent(){
		global $connect;
			$sql= sprintf("SELECT `event_id`,`name`, `date`, `status`,`img` FROM `events` WHERE `status`= 'Активен' ORDER BY `date` DESC LIMIT 3");
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}
			
			$data="";
			while($row=$result->fetch_assoc()){
					$data .=sprintf('<div class="colomn">
								<div class="card-body text-center">
									<img class="bd-placeholder-img rounded-circle mb-3" width="200" height="200" src="../img/events/'.htmlspecialchars($row['img']).'">
									<h5 class="card-title">%s</h5>
									<p class="mb-1">%s</p>
								</div>
							</div>',$row['name'], $row['date']);
					}
			return $data;
		}

	//прошедшие мероприятия
		function GetInactivEvent(){
			global $connect;
			$sql= sprintf("SELECT `name`,`description`,`status` FROM `events`");
			if(!$result=$connect->query($sql)){
				echo "Ошибка получения данных";
			}
			
			$data="";
			while($row=$result->fetch_assoc()){
			if($row['status']=='Скоро'){
					$data .=sprintf('<div class="col">
								<div class="card border-info p-2 g-3">
									<div class="card-body">
										<h5 class="card-title">%s</h5>
										<p class="mb-1">%s</p>
									</div>
								</div>
							</div>', $row['name'], $row['description']);
						}
					}
			return $data;
		}

	//вывод обращений пользователей
		function GetHelp() {
		    global $connect;

		    $data = '';

		    $sql = "SELECT `user_id`, `name`, `help`.`text` AS `text`, `help`.`help_id` AS `help_id` FROM `users` INNER JOIN `help` USING(`user_id`) WHERE `status`='Новое' ORDER BY `help_id` DESC";

		    if (!$result = $connect->query($sql)) {
		        echo "Ошибка получения данных: " . $connect->error;
		        return '';
		    }

		    if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		            $data .= '<div class="col">
		                <div class="card border-info p-2 g-3">
		                    <div class="card-body">
		                    	<p class="mb-1"><span class="fw-semibold">ID: </span>' . htmlspecialchars($row['user_id']) . '</p>
		                        <p class="mb-1"><span class="fw-semibold">Пользователь: </span>' . htmlspecialchars($row['name']) . '</p>
		                        <p class="mb-1"><span class="fw-semibold">Описание: </span>' . htmlspecialchars($row['text']) . '</p>
		                    	<div class="col d-flex justify-content-end mt-4">
	            					<a href="../controller/update-help.php?id='.htmlspecialchars($row['help_id']).'&action=danger" class="btn btn-outline-secondary fw-semibold m-2">Важное</a>
	            					<a href="../controller/update-help.php?id='.htmlspecialchars($row['help_id']).'&action=delet" class="btn btn-outline-danger fw-semibold m-2">Удалить</a>
	        					</div>
		                    </div>
		                </div>
		            </div>';
		        }
		    } else {
		        $data .= '<p>Нет сообщений</p>';
		    }

		    return $data;
		}

	//Обрашение с статусом важное
		function GetAlertHelp() {
		    global $connect;

		    $data = '';

		    $sql = "SELECT `user_id`, `name`, `help`.`text` AS `text`, `help`.`help_id` AS `help_id` FROM `users` INNER JOIN `help` USING(`user_id`) WHERE `status`= 'Важно' ORDER BY `help_id` DESC";

		    if (!$result = $connect->query($sql)) {
		        echo "Ошибка получения данных: " . $connect->error;
		        return '';
		    }

		    if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		            $data .= '<div class="col">
		                <div class="card border-danger p-2 g-3">
		                    <div class="card-body">
		                    	<p class="mb-1"><span class="fw-semibold">ID: </span>' . htmlspecialchars($row['user_id']) . '</p>
		                        <p class="mb-1"><span class="fw-semibold">Пользователь: </span>' . htmlspecialchars($row['name']) . '</p>
		                        <p class="mb-1"><span class="fw-semibold">Описание: </span>' . htmlspecialchars($row['text']) . '</p>
		                    	<div class="col d-flex justify-content-end mt-4">
	            					<a href="../controller/update-help.php?id='.htmlspecialchars($row['help_id']).'&action=update" class="btn btn-outline-secondary fw-semibold">Убрать</a>
	        					</div>
		                    </div>
		                </div>
		            </div>';
		        }
		    } else {
		        $data .= '<p>Нет важных сообщений</p>';
		    }

		    return $data;
		}

	//экспонаты
		function GetEksponats() {
		    global $connect;

		    $data = '';

		    $sql = "SELECT `name`,`description`,`edu_name`,`interesting facts_1`,`interesting facts_2`,`interesting facts_3`,`img` FROM `eksponats`";

		    if (!$result = $connect->query($sql)) {
		        echo "Ошибка получения данных: " . $connect->error;
		        return '';
		    }

		    if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		            $data .= '<hr class="featurette-divider">
									<div class="row featurette">
										<div class="col-md-7">
											<h5 class="featurette-heading fw-normal lh-1">'.htmlspecialchars($row['name']).'</h5>
											<p class="text">
												'.htmlspecialchars($row['description']).'
											</p>
											<p class="text"> 
												'.htmlspecialchars($row['edu_name']).'
											</p>
											<p class="text">
												Интересные факты: <br>
												'.htmlspecialchars($row['interesting facts_1']).'<br>
												'.htmlspecialchars($row['interesting facts_2']).'<br>
												'.htmlspecialchars($row['interesting facts_3']).'
											</p>
										</div>
										<div class="col-md-5">
											<img class="rounded" src="../img/eksponats/'.htmlspecialchars($row['img']).'" width="100%" loading="lazy">
										</div>
									</div>';
		        }
		    }
		    return $data;
		}

	//3D модели
		function Get3DEksponats() {
		    global $connect;

		    $data = '';

		    $sql = "SELECT `name`,`description`,`edu_name`,`interesting facts_1`,`interesting facts_2`,`interesting facts_3`,`3d_model` FROM `eksponats`";

		    if (!$result = $connect->query($sql)) {
		        echo "Ошибка получения данных: " . $connect->error;
		        return '';
		    }

		    if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		            $data .= '<hr class="featurette-divider">
									<div class="row featurette">
										<div class="col-md-7">
											<h5 class="featurette-heading fw-normal lh-1">'.htmlspecialchars($row['name']).'</h5>
											<p class="text">
												'.htmlspecialchars($row['description']).'
											</p>
											<p class="text"> 
												'.htmlspecialchars($row['edu_name']).'
											</p>
											<p class="text">
												Интересные факты: <br>
												'.htmlspecialchars($row['interesting facts_1']).'<br>
												'.htmlspecialchars($row['interesting facts_2']).'<br>
												'.htmlspecialchars($row['interesting facts_3']).'
											</p>
										</div>
										<div class="col-md-5">
											<spline-viewer hint loading-anim-type="spinner-small-dark" url="'.htmlspecialchars($row['3d_model']).'" background="rgba(255,255,255,0.2)"></spline-viewer>
										</div>
									</div>';
		        }
		    }
		    return $data;
		}

	//вывод обращений администратора в лк полз
		function GetReHelp($login){
			global $connect;
			
			$select=sprintf("SELECT `user_id` FROM `users` WHERE `login`='%s'",$login);
			$select_result=$connect->query($select);
			$select_row=$select_result->fetch_assoc();
			$id=$select_row['user_id'];

			$sql=sprintf("SELECT `text` FROM `rehelp` where `user_id`='%s' ORDER BY `rehelp_id` DESC",$id);
			
			if(!$result=$connect->query($sql)){
				echo "Ошика получения данных";
			}

			$data="";
			if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		            $data .= '<div class="col">
		                <div class="card border-info p-2 g-3">
		                    <div class="card-body">
		                        <p class="mb-1"><span class="fw-semibold">Комментарий администратора: </span> <br>' . htmlspecialchars($row['text']) . '</p>
		                    </div>
		                </div>
		            </div>';
		        }
		    } else {
		        $data .= '<p>Нет ответа</p>';
		    }

		    return $data;

		}

	//вывод об участвии в меропритий в личном кабинете
		function GetUserActivEvent($login){
			global $connect;
			
			$select=sprintf("SELECT `user_id` FROM `users` WHERE `login`='%s'",$login);
			$select_result=$connect->query($select);
			$select_row=$select_result->fetch_assoc();
			$id=$select_row['user_id'];

			$sql=sprintf("SELECT `name`,`date`,`description`,`status` FROM `events` INNER JOIN `activ-event` ON `events`.`event_id`=`activ-event`.`event_id` WHERE `activ-event`.`user_id`='%s'",$id);
			
			if(!$result=$connect->query($sql)){
				echo "Ошика получения данных";
			}

			$data="";
			while($row=$result->fetch_assoc()){
				if($row['status']=='Активен'){
						$data .=sprintf('<div class="col">
									<div class="card shadow-sm border-success">
									<div class="card-body">
											<h5 class="card-title">%s</h5>
											<p class="mb-1"><span class="fw-semibold">Дата:</span> %s</p>
											<p class="mb-1"><span class="fw-semibold">Описание: </span>%s</p>
										</div>
									</div>
								</div>',$row['name'], $row['date'], $row['description']);
				}
			}
			return $data;


		}
		
?>