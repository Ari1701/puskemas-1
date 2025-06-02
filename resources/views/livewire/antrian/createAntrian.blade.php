<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createAntrian" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form ambil antrian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="close_modal"
                    aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="save">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Keluhan</label>
                        <textarea class="form-control" wire:model="keluhan" cols="20"></textarea>
                        @error('keluhan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Ambil antrian untuk poli</label>
                        <select class="form-select" wire:model="poli" aria-label="Default select example">
                            <option selected>Pilih poli</option>
                            <option value="umum">Poli Umum</option>
                            <option value="gigi">Poli Gigi</option>
                            <option value="lansia">Poli Lansia</option>
                            <option value="balita">Poli Balita</option>
                            <option value="kia & kb">Poli KIA&KB</option>
                            <option value="nifas/pnc">Poli Nifas/PNC</option>
                        </select>
                        @error('poli')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="close_modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
