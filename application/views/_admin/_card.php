<h1>Карты партнера:</h1>	


<?php foreach ($card as $card_item): ?>

        <h3> Карта <?php echo $card_item['type']; ?> № <?php echo $card_item['id']; ?></h3>
		<?
		if ($card_item['type'] != 'classic')
		{
			if ($card_item['statys'] == '1')
				{?>
					 <p><a href="<?='admin/view_card/'.$card_item['id'] ?>">Подробнее о карте и матрице</a></p>
				<?	
				}
				else{ ?>
					 <p>Карта не оплачена, подробная информация не доступна.</p>			
				<?}

		}
endforeach; ?>	