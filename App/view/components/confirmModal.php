<?php getCss('confirmModal.css') ?>

<div class="confirm-modal" id="confirm-modal" style="visibility: hidden;">
  <div class="m-wrapper">
    <div class="confirm-modal-container">
      <div class="m-close-container">
        <button href="" class="btn m-close" onclick="closeConfirmModal(event)">X</button>
      </div>
      <div class="m-text-container">
        <h3 class="m-text m-text1">Are you sure want to delete this Artist?</h3>
        <p class="m-text">All of their songs will be deleted too.</p>
      </div>
      <div class="m-btn-container">
        <button class="m-delete-btn btn" id="m-delete-btn">Delete it anyway</button>
        <button class="m-cancel-btn btn" onclick="closeConfirmModal(event)">Cancel</button>
        
      </div>
    </div>
  </div>
</div>