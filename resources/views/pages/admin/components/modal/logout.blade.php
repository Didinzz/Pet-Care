<!-- Logout Modal -->
<div class="modal-backdrop" id="logout-alert">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Logout Alert</h3>
            <button class="modal-close" id="closeButton">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to logout?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="cancelLogout">Cancel</button>
            <a href="{{ route('logout') }}"><button class="btn btn-primary" id="confirm-logout">Logout</button></a>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('logout-alert');

    const buttonLogout = document.getElementById('logoutButton');

    const closeModalLogoutButton = document.getElementById('closeButton');
    const cancelLogoutButton = document.getElementById('cancelLogout');

    buttonLogout.addEventListener('click', function() {
        modal.classList.add('show');

        closeModalLogoutButton.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        cancelLogoutButton.addEventListener('click', function() {
            modal.classList.remove('show');
        });
    });
</script>
