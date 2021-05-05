 
 
<!--modal of register, forgot password, enter code, reset password-->
<template id="rg-fp-modal">
    <transition 
          enter-active-class="animated fadeInLeft"
    leave-active-class="animated rollOut"><div class="modal d-md-block mt-5" tabindex="-1" role="dialog">
  <div class="modal-dialog dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><slot name="head"></slot></h5>
        <button type="button" class="close text-white" @click="$emit('close')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <slot name="body"></slot>
      </div>
      <div class="modal-footer">
       <slot name="foot"></slot>
      </div>
    </div>
  </div>
</div></transition>
</template>


<!--success alert of register and forgot password-->
<template id="success-alert">
    <transition 
          enter-active-class="animated fadeIn" leave-active-class="animated fadeOut"> 
<p class='alert alert-success position-absolute w-50' style="z-index:1">{{message}}</p>
</transition>
</template>