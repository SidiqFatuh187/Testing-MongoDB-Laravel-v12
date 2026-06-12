<div id="deleteModal" class="delete-modal hidden" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
    <div class="delete-card">
        <form id="deleteForm" action="" method="POST">
            @csrf
            @method('DELETE')
            <div class="delete-content">
                <div class="delete-icon-wrapper">
                    <svg class="delete-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 9v2m0 4h.01" />
                        <path d="M6.06 18.5h11.88c1.22 0 2.06-1.09 1.66-2.22L13.66 4.78c-.39-1.13-1.84-1.13-2.23 0L4.4 16.28c-.39 1.13.45 2.22 1.66 2.22z" />
                    </svg>
                </div>
                <h3 id="deleteModalTitle">{{ $title ?? 'Hapus Item Ini?' }}</h3>
                <p>
                    <span id="modal-item-name" class="delete-item-name"></span> akan dihapus permanen dan tidak bisa dikembalikan.
                </p>
                <div class="delete-actions">
                    <button type="button" onclick="closeDeleteModal()" class="delete-cancel">
                        Batal
                    </button>
                    <button type="submit" class="delete-confirm">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .hidden {
        display: none !important;
    }

    .delete-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: rgba(15, 23, 42, 0.72);
        backdrop-filter: blur(6px);
    }

    .delete-card {
        width: 100%;
        max-width: 28rem;
        background: #ffffff;
        border-radius: 1.25rem;
        box-shadow: 0 24px 80px rgba(15, 23, 42, 0.18);
        overflow: hidden;
    }

    .delete-content {
        padding: 1.75rem;
        text-align: center;
        color: #0f172a;
        font-family: 'DM Sans', sans-serif;
    }

    .delete-icon-wrapper {
        width: 4rem;
        height: 4rem;
        margin: 0 auto 1.25rem;
        border-radius: 9999px;
        background: #fee2e2;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 12px 28px rgba(220, 38, 38, 0.16);
    }

    .delete-icon {
        width: 1.75rem;
        height: 1.75rem;
        color: #b91c1c;
    }

    .delete-content h3 {
        margin-bottom: 0.75rem;
        font-size: 1.125rem;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .delete-content p {
        margin: 0;
        color: #475569;
        font-size: 0.95rem;
        line-height: 1.75;
    }

    .delete-item-name {
        font-weight: 700;
        color: #0f172a;
    }

    .delete-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    .delete-cancel,
    .delete-confirm {
        min-width: 9rem;
        padding: 0.85rem 1rem;
        border: none;
        border-radius: 0.95rem;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        transition: transform 0.15s ease, background-color 0.15s ease;
    }

    .delete-cancel {
        background: #f8fafc;
        color: #334155;
    }

    .delete-cancel:hover {
        background: #e2e8f0;
    }

    .delete-confirm {
        background: #dc2626;
        color: #ffffff;
    }

    .delete-confirm:hover {
        background: #b91c1c;
    }

    .delete-cancel:active,
    .delete-confirm:active {
        transform: scale(0.98);
    }

    @media (max-width: 520px) {
        .delete-actions {
            flex-direction: column;
        }
    }
</style>

<script>
    function openDeleteModal(action, name) {
        document.getElementById('deleteForm').action = action;
        document.getElementById('modal-item-name').textContent = '"' + name + '"';
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>