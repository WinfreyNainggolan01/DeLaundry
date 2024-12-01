<!-- Overlay Modal -->
<div id="feedbackModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 relative transform -translate-y-full transition-all duration-300 ease-out"
         id="modalContent">
        
        <!-- Header Modal -->
        <div class="flex justify-between items-center border-b pb-4">
            <h3 class="text-2xl font-semibold text-gray-800">Berikan Tanggapan</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <!-- Body Modal -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
            
            <div>
                <img src="{{ asset('img/luntur.png') }}" alt="Complaint Image" class="w-full h-auto rounded">
            </div>

         
            <div class="text-gray-700 text-sm space-y-4">
                <p><strong>Subjek:</strong> Baju Putih Luntur</p>
                <p><strong>Order ID:</strong> DLR3455434</p>
                <p><strong>Deskripsi:</strong> Terdapat noda berwarna pink di sekitar kancing baju</p>
            </div>
        </div>

        <!-- Form Feedback -->
        <div class="mb-4">
            <label for="feedback" class="block text-lg font-medium text-gray-700 mb-2">Tanggapan</label>
            <textarea id="feedback" class="w-full border rounded-lg p-4 focus:outline-none focus:ring focus:border-blue-300" rows="5" placeholder="Write your feedback here..."></textarea>
        </div>

        <!-- Footer Modal -->
        <div class="modal-footer flex justify-end space-x-4 w-full">
            <button type="button" onclick="closeModal()" class="bg-gray-300 text-gray-600 hover:bg-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 py-2 px-6 rounded">
                Batal
            </button>

            <button type="button" class="bg-[#28397e] border border-[#031003] text-white py-2 px-6 rounded hover:bg-[#1e2d63] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#031003]" id="saveChangesButton">
                Kirim
            </button>
        </div>
    </div>
</div>


<script>
    function openModal() {
    
        let modal = document.getElementById('feedbackModal');
        let modalContent = document.getElementById('modalContent');
        modal.classList.remove('hidden');
        
       
        setTimeout(function() {
            modalContent.classList.remove('-translate-y-full');
        }, 10); 
    }

    function closeModal() {
        
        let modal = document.getElementById('feedbackModal');
        let modalContent = document.getElementById('modalContent');
        modalContent.classList.add('-translate-y-full');
        
        
        setTimeout(function() {
            modal.classList.add('hidden');
        }, 300); 
    }
</script>