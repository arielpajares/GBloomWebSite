function modal(title, body, footerBtns = ''){
    //lo primero que debo hacer es ver si ya existe un modal
    const existingModal = document.getElementById("customModal");
    if(existingModal){
        existingModal.remove();
    }

    const modalHTML = `
    <div class="modal fade" id="customModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">${title}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            ${body}
          </div>

          <div class="modal-footer">
            ${footerBtns || `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>`}
          </div>

        </div>
      </div>
    </div>
  `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    const modalElement = document.getElementById("customModal");
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
}