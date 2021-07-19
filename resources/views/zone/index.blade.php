<x-auth-layout>
    <x-slot name="page_title">Mahanagarpalika</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar:true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            window.addEventListener('alert',({detail:{type,message}})=>{
                Toast.fire({
                    icon:type,
                    title:message
                })
            })
            </script>
    </x-slot>
    @livewire('zone')

    <!-- END CONTACT FORM SECTION -->

    <!-- Include the Livewire Scripts -->
     @livewireScripts
   
</x-auth-layout>
