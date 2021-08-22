<div class="view_books" id="view_books_special">
        <?php while($this_books = mysqli_fetch_assoc($result_special)) {

          output_book_body($this_books);

         } ?>

         <div class="pagina">
          <div id="pagina_list"> 
            <?php if($current_page_special!=1) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(3, $current_page_special-1) ?>">
                <li><-</li>
              </a>
            <?php } ?>

            <?php if($current_page_special == $numb_of_pages_special
                      and $current_page_special-2>0) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(3, $current_page_special-2) ?>">
                <li><?php echo $current_page_special-2; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_special != 1
                  and $current_page_special-1>0) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(3, $current_page_special-1) ?>">
                <li><?php echo $current_page_special-1; ?></li>
              </a>
            <?php } ?>

            <a class="pagina_element current_pagina" 
            href="<?php echo form_url_query(3, $current_page_special) ?>">
              <li><?php echo $current_page_special; ?></li>
            </a>

            <?php if($current_page_special != $numb_of_pages_special
                      and $current_page_special+1<=$numb_of_pages_special) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(3, $current_page_special+1) ?>">
                <li><?php echo $current_page_special+1; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_special == 1 
                    and $current_page_special+2<=$numb_of_pages_special) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(3, $current_page_special+2) ?>">
                <li><?php echo $current_page_special+2; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_special!=$numb_of_pages_special) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(3, $current_page_special+1) ?>">
                <li>-></li>
              </a>
            <?php } ?>

          </div>
      </div><!-- Пагинация -->

      </div> <!--Блок отображения книг хиты продаж _______________________________-->