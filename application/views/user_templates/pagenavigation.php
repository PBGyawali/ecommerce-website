<nav aria-label="Page navigation sample" v-if="placeordersts">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="">1</a></li>
    <?php 
    for ($k=2;$k<=rand(3,10);$k++)
    echo '<li class="page-item"><a class="page-link" href="">'.$k.'</a></li>'?>    
    <li class="page-item"><a class="page-link" href="">Next</a></li>
  </ul>
</nav>
  </main> <!-- col.// -->
    </div>
      </div> <!-- container .//  -->
        </section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_results="totalproducts"
         :page_range="pageRange"
         >
      </pagination>