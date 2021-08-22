<div class="view_books" id="view_books_new">
        <?php while($this_books = mysqli_fetch_assoc($result_new)) {

          output_book_body($this_books);

         } ?>

        <div class="pagina">
            <div id="pagina_list"> 
            <?php if($current_page_new!=1) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(2, $current_page_new-1) ?>">
                <li><-</li>
              </a>
            <?php } ?>

            <?php if($current_page_new == $numb_of_pages_new 
                    and $current_page_new-2>0) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(2, $current_page_new-2) ?>">
                <li><?php echo $current_page_new-2; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_new != 1
                  and $current_page_new-1>0) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(2, $current_page_new-1) ?>">
                <li><?php echo $current_page_new-1; ?></li>
              </a>
            <?php } ?>

            <a class="pagina_element current_pagina" 
            href=<?php echo form_url_query(2, $current_page_new) ?>"" >
              <li><?php echo $current_page_new; ?></li>
            </a>

            <?php if($current_page_new != $numb_of_pages_new
                      and $current_page_new+1<=$numb_of_pages_new) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(2, $current_page_new+1) ?>">
                <li><?php echo $current_page_new+1; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_new == 1
                    and $current_page_new+2<=$numb_of_pages_new) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(2, $current_page_new+2) ?>">
                <li><?php echo $current_page_new+2; ?></li>
              </a>
            <?php } ?>

            <?php if($current_page_new!=$numb_of_pages_new) {?>
              <a class="pagina_element" 
              href="<?php echo form_url_query(2, $current_page_new+1) ?>">
                <li>-></li>
              </a>
            <?php } ?>

          </div>
        </div><!-- Пагинация -->

      </div> <!--Блок отображения книг новинки __________________________________-->