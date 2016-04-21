      <div class='grid grid-1-2'>
<?php 
  $numOfFolders = count($this->model['folders']);
  for($i = 0; $i < $numOfFolders; $i++){ if($this->model['folders'][$i]->visibility != 'visible') continue;?>
        <div class='grid_cell'>
          <div class='grid_cell--content folder_cell grid-shadow'>
            <div class='folder_cell-title'>
              <a href='index.php?controller=Folder&action=onGetCategories&name=<?php echo $this->model['folders'][$i]->name;?>'>
                <h2><?php echo $this->model['folders'][$i]->name;?></h2>
              </a>
            </div>
            <div class='folder_cell-body'>
              <p><?php $this->model['folders'][$i]->summary;?></p>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($role) && $role === 'admin'):?>
              <a id='folder-delete' href='index.php?controller=Folder&action=onDelete&id=<?php echo $this->model['folders'][$i]->folderId;?>'>delete</a>
              <a id='folder-edit' href='#'>edit</a>
<?php endif?>
            </div>
          </div>
        </div>
<?php }?>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($role) && $role === 'admin'):?>
        <div class='grid_cell'>
          <div class='grid_cell--content grid-shadow'>
             <a href='index.php?route=FIXME'>add</a>
          </div>
        </div>
<?php endif?>
      </div>
      <div class='grid grid-1-2'>
<?php 
  $numOfArticles = count($this->model['articles']);
  for($i = 0; $i < $numOfArticles; $i++){ if($this->model['articles'][$i]->visibility != 'visible') continue;?>
        <div class='grid_cell'>
          <div class='grid_cell--content article_cell grid-shadow'>
            <div class='article_cell-title'>
              <a href='index.php?controller=Article&action=onGetArticle&id=<?php echo $this->model['articles'][$i]->articleId;?>'>
                <h2><?php echo $this->model['articles'][$i]->title?></h2>
              </a>
            </div>
            <div class='article_cell-body'>
              <p><?php $this->model['articles'][$i]->summary;?></p>
              <p class='article-date'><?php echo $this->model['articles'][$i]->publicationDate;?></p>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($role) && $role === 'admin'):?>
              <a id='article-delete' href='index.php?controller=Article&action=onDelete&id=<?php echo $this->model['articles'][$i]->articleId;?>'>delete</a>
              <a id='article-edit' href='#'>edit</a>
<?php endif?>
            </div>
          </div>
        </div>
<?php }?>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($role) && $role === 'admin'):?>
        <div class='grid_cell'>
          <div class='grid_cell--content grid-shadow'>
             <a href='index.php?route=FIXME'>add</a>
          </div>
        </div>
<?php endif?>
      </div>