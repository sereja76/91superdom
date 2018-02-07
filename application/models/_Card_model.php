<?

class Card_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_cards($id = FALSE, $user = FALSE)
{
        if ($id == '')
        {		
				$this->db->where('user', $user);
                $query = $this->db->get('card');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('card', array('id' => $id, 'user' => $user));
        return $query->row_array();
}



		public function get_all_cards() // показ всех карт для админа
{
                $query = $this->db->get('card');
                return $query->result_array();
        
}

		public function total_cards() // считаем количество всех карт
		{
                $query = $this->db->get('card');
                return $query->num_rows();
		}

		public function total_cards_pay() // считаем оплаченные карты
		{
                $query = $this->db->get_where('card', array('statys' => 1));
                return $query->num_rows();
		}
		
		public function total_cards_amount() // считаем сумму оплаченных карт
		{
    			$this->db->select_sum('amount');
				$query = $this->db->get_where('card', array('statys' => 1)); 
				return $query->row();
				
				
		}

		public function get_tree_cards($id_card) // считаем дерево карточек id_card - карта от которой считаем партнеров
		{
			$tree_card['messg'] = '';
			$query = $this->db->get_where('card', array('id'=> $id_card, 'statys' => 1), 1);
			$row = $query->row();
			
			if ($row->type == 'silver') { // переменные silver карты
				$pay_level_1 = 2500;
				$pay_level_2 = 6250;
				$pay_level_3 = 15625;
				$pay_level_4 = 37500;
				$pay_level_5 = 93750;
				
			}
			
			if ($row->type == 'gold') { // переменные gold карты
				$pay_level_1 = 25000;
				$pay_level_2 = 62500;
				$pay_level_3 = 156250;
				$pay_level_4 = 375000;
				$pay_level_5 = 937500;	
			}		

			// первый проход партнеров
			$this->db->where(array('refer'=> $id_card, 'statys' => 1, 'type' => $row->type)); 
            $query = $this->db->get('card');
				$money = 0; $money_l2 = 0; $money_l3 = 0; $money_l4 = 0; $money_l5 = 0;
				$tree_card['tree'] = '';
			
				if ($query->num_rows() >= 5 ) { $money += $pay_level_1; } // считаем вознаграждение 
				if ($query->num_rows() > 0 ) { /* делаем новый виток запросов в грубину*/ 
					// тут уже циклом разбираем первые 5 результатов и по ним делаем такие же подсчеты
					
					$tree_card['tree'] .= '<table id="ex1-common-parent"><tr><td class="arr1"><img src="img/'.$row->type.'_tree.png"><p>Ваша карта №'.$id_card.'</p></td><td>';
					
					$tree_card['tree'] .= '<table><tr>';
					
					$a =0;
					foreach ($query->result_array() as $tree_item1):
							$a++;
							$tree_card['tree'] .= '<td class="arr1'.$a.'"></td><td><img src="img/'.$row->type.'_tree.png"><p>Партнер 1го уровня с картой №'.$tree_item1['id'].'</p></td><td>'; 
							
							$this->db->where(array('refer'=> $tree_item1['id'], 'statys' => 1, 'type' => $row->type)); 
							$query2 = $this->db->get('card');
							
							if ($query2->num_rows() >= 5 ) { $money_l2+= 1; } // считаем вознаграждение
							if ($query2->num_rows() > 0 ) { // новый виток запросов
								

								$tree_card['tree'] .= '<table>';
								foreach ($query2->result_array() as $tree_item2):
								$tree_card['tree'] .= '<tr><td><img src="img/'.$row->type.'_tree.png"><p>Партнер 2го уровня с картой №'.$tree_item2['id'].'</p></td><td>'; 
								
								$this->db->where(array('refer'=> $tree_item2['id'], 'statys' => 1, 'type' => $row->type)); 
								$query3 = $this->db->get('card');
								
								if ($query3->num_rows() >= 5 ) { $money_l3+= 1; } // считаем вознаграждение
								if ($query3->num_rows() > 0 ) { // новый виток запросов
									
									$tree_card['tree'] .= '<table>';
									foreach ($query3->result_array() as $tree_item3):
									$tree_card['tree'] .= '<tr><td><img src="img/'.$row->type.'_tree.png"><p>Партнер 3го уровня с картой №'.$tree_item3['id'].'</p></td><td>'; 
									
									$this->db->where(array('refer'=> $tree_item3['id'], 'statys' => 1, 'type' => $row->type)); 
									$query3 = $this->db->get('card');
									
									if ($query3->num_rows() >= 5 ) { $money_l4+= 1; } // считаем вознаграждение
									if ($query3->num_rows() > 0 ) { // новый виток запросов
										
										$tree_card['tree'] .= '<table>';										
										foreach ($query3->result_array() as $tree_item4):
										$tree_card['tree'] .= '<tr><td><img src="img/'.$row->type.'_tree.png"><p>Партнер 4го уровня с картой №'.$tree_item4['id'].'</p></td><td>'; 
										
										$this->db->where(array('refer'=> $tree_item4['id'], 'statys' => 1, 'type' => $row->type)); 
										$query4 = $this->db->get('card');
										
										if ($query4->num_rows() >= 5 ) { $money_l5+= 1; } // считаем вознаграждение
										if ($query4->num_rows() > 0 ) { // новый виток запросов
											
											$tree_card['tree'] .= '<table>';
											foreach ($query4->result_array() as $tree_item5):
											$tree_card['tree'] .= '<tr><td><img src="img/'.$row->type.'_tree.png"><p>Партнер 5го уровня с картой №'.$tree_item5['id'].'</p></td>'; 
											
											$tree_card['tree'] .= '</tr>';
											endforeach;	
											$tree_card['tree'] .= '</tr></table>';
											
										} 
									
										$tree_card['tree'] .= '</tr>';
										endforeach;	
										$tree_card['tree'] .= '</tr></table>';
									} 
									$tree_card['tree'] .= '</tr>';
									endforeach;	
									$tree_card['tree'] .= '</tr></table>';
								}
								$tree_card['tree'] .= '</tr>';
								endforeach;
								$tree_card['tree'] .= '</tr></table>';
							} 
					$tree_card['tree'] .= '</tr>';		
					endforeach;	
				$tree_card['tree'] .= '</table>';
				$tree_card['tree'] .= '</td></tr></table>';
				
				$tree_card['tree'] .= "				<script type='text/javascript'>
					  // 3. Определим «общего родителя», на котором будут рисоваться стрелки (создаваться холст – canvas)
					  var arrowsDrawer1 = \$cArrows('#ex1-common-parent', { render:{lineWidth: 3, strokeStyle: '#с0с0с0'}});
					  
					  // 4. Рисуем стрелки .arrow(from, to)
					  arrowsDrawer1
					  .arrow('.arr1', '.arr11', { arrow: {connectionType: 'side', sideFrom: 'right',sideTo: 'left' }})
					  .arrow('.arr1', '.arr12', { arrow: {connectionType: 'side', sideFrom: 'right',sideTo: 'left' }})
					  .arrow('.arr1', '.arr13', { arrow: {connectionType: 'side', sideFrom: 'right',sideTo: 'left' }})
					  .arrow('.arr1', '.arr14', { arrow: {connectionType: 'side', sideFrom: 'right',sideTo: 'left' }})
					  .arrow('.arr1', '.arr15', { arrow: {connectionType: 'side', sideFrom: 'right',sideTo: 'left' }});  

					</script>";
  				}
				
				
   
				else {$tree_card['messg'] = 'Пока не привлечено партнеров и ваше дерево пусто';}
			
			// Считаем сколько итого заработано
			if ($money_l2 >= 5) {$money += $pay_level_2;}
			if ($money_l3 >= 25) {$money += $pay_level_3;}
			if ($money_l4 >= 125) {$money += $pay_level_4;}
			if ($money_l5 >= 625) {$money += $pay_level_5;}
			
			
			// у меня сомнения в подсчете бальности... проверить работет ли это
			
			
			$tree_card['money'] = $money;
			$tree_card['num_rows'] = $query->num_rows();
			
			return $tree_card;
			/*
			// первый проход партнеров
			$this->db->where(array('refer'=> $id_card, 'statys' => 1, 'type' => $row->type)); // + надо оплату добавить
            $query = $this->db->get('card');
				$money = 0; // сколько денег заработал.
			
				if ($query->num_rows() >= 5 ) { $money += $pay_level_1; } // считаем вознаграждение 
				if ($query->num_rows() > 0 ) { /* делаем новый виток запросов в грубину
				
				}
			
			// проверка сколько строчек вернулось... Далее 0 или 5 и больше соотв начисляем бонусы и добавляем визуальный код для отображения.
				
				
				 
				Как работает:
					1. Смотрим какой тип карты 
						Классика - нах - ни чего не считаем, остальные считаем.
						Голд и сильвер - разные суммы будут.
					2. Смотрим циклом сколько карт продано (5ка) да\нет, скорее всего лучше это сделать отдельной функцией которая будет возвращать сколько партнеров привлечено (0-5+)
					И так все 5 уровней сканируем
					
					А все это отдельной функцией тк при оплате тоже будем смотреть куда пихнуть нашего партнера
					
					По факту закрытия уровня добавляем нужную сумму.
					
					3. Графическое построение дерева патрнеров
					
				
				
				
				Цели функции
				
				
				
					1. 
					
					Как считать 
				Цикл который мой рефер привлек ли первые 5 (при этом данные этих запоминаем)
					Да - считаем бонус - и наверно это надо делать при оплате, ведь нам надо понимать из за переливов куда чела пихать
						Насчитываем бонус, вписываем его в таблицу бонусов и сверяем, а не получал ли он уже его?
						
						Считаем так все уровни.
						
						
						
			Какие задачи от цикла
				Подсчет прибыли партнера
				Визуальное отображение дерева партнеров
				
				
				Понятие куда пихать патрнера при оплате
				
				Когда партнер регается - надо его регать как прямого, а при оплате он уже сам распределится - тут цикл и покажет куда его вписывать, те где свободно и не хватает партнеров туда его и вписываем.
				
				*/
				
		}
		
		
}

