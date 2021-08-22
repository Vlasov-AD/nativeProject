<!--Отрисовка книг для каждой вкладки -->
      <div class="view_books" id="view_books_best">
        <?php while($this_books = mysqli_fetch_assoc($result_best)) {

          output_book_body($this_books);

         } ?>


      <div class="pagina">
          <div id="pagina_list"> 
            <?php if($current_page_best!=1) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(1, $current_page_best-1) ?>">
                <li><-</li>
              </a>
            <?php } ?>

            <?php if($current_page_best == $numb_of_pages_best 
                      and $current_page_best-2>0) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(1, $current_page_best-2) ?>">
                <li><?php echo $current_page_best-2; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_best != 1
                      and $current_page_best-1>0) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(1, $current_page_best-1) ?>">
                <li><?php echo $current_page_best-1; ?></li>
              </a>
            <?php } ?>

            <a class="pagina_element current_pagina" 
            href="<?php echo form_url_query(1, $current_page_best) ?>" >
              <li><?php echo $current_page_best; ?></li>
            </a>

            <?php if($current_page_best != $numb_of_pages_best
                      and $current_page_best+1<=$numb_of_pages_best) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(1, $current_page_best+1) ?>">
                <li><?php echo $current_page_best+1; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_best == 1
                     and $current_page_best+2<=$numb_of_pages_best) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(1, $current_page_best+2) ?>">
                <li><?php echo $current_page_best+2; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_best!=$numb_of_pages_best) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(1, $current_page_best+1) ?>">
                <li>-></li>
              </a>
            <?php } ?>

          </div>
      </div><!-- Пагинация  -->

      </div> <!--Блок отображения книг хиты продаж ___________________________-->