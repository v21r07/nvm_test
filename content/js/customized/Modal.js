    // Fonction pour afficher la boîte de dialogue de confirmation
    function showConfirmDeleteModal() {
					$('#confirmDeleteModal').modal('show');
			}

	// Attache un gestionnaire d'événement au bouton de suppression pour afficher la boîte de dialogue de confirmation
	$('.ActionIrreversible').click(function(e) {
					e.preventDefault();
					$('#confirmDeleteBtn').attr('href', $(this).attr('href'));
					showConfirmDeleteModal();
	});

	// Attache un gestionnaire d'événement au bouton de confirmation de suppression pour déclencher l'action de suppression
	$('#confirmDeleteBtn').click(function() {
					window.location.href = $(this).attr('href');
	});
	$('#confirmDeleteModal').on('hidden.bs.modal', function() {
					$('#confirmDeleteBtn').removeAttr('href');
	});
	$('.cancelDeleteBtn').click(function() {
					$('#confirmDeleteModal').modal('hide');
	});