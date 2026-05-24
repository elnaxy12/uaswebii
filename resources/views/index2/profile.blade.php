<div class="md:pt-[14rem] pt-4 pl-5 flex flex-col gap-2 container">
    <h1 class="text-4xl font-sans select-none font-semibold">My Profile</h1>
    <div class="flex flex-col gap-2">
        <h1 class="font-semibold select-none">Account Information</h1>
        <div class="grid w-xs grid-cols-[100px_10px_1fr] gap-y-2 text-sm">

            <p class="font-semibold">Username</p>
            <p>:</p>
            <p>{{ $user->username }}</p>

            <p class="font-semibold">E-mail</p>
            <p>:</p>
            <p>{{ $user->email }}</p>

            <p class="font-semibold">No Hp</p>
            <p>:</p>
            <p>{{ $user->phone }}</p>

            <p class="font-semibold">Province</p>
            <p>:</p>
            <p>{{ $user->province_name }}</p>

            <p class="font-semibold">City</p>
            <p>:</p>
            <p>{{ $user->city_name }}</p>

            <p class="font-semibold">Address</p>
            <p>:</p>
            <p>{{ $user->address }}</p>

        </div>
    </div>
    <div class="flex justify-end md:w-xl p-2">
        <button id="showBtn"
            class="outline-solid outline-white pt-2 pb-2 pr-4 pl-4 outline-1 bg-black text-white rounded-xs text-xs cursor-pointer focus:bg-white focus:text-black focus:border-black border-white border-1">
            Edit Profil
        </button>
    </div>
</div>

<script>
    const savedProvinceId = "{{ old('province_id', $user->province_id) }}";
    const savedCityId = "{{ old('city_id', $user->city_id) }}";

    const citySelect = document.getElementById('city_select');

    fetch('/uaswebii/public/api/provinces')
        .then(res => res.json())
        .then(data => {
            const select = document.getElementById('province_select');
            data.data.forEach(province => {
                const option = document.createElement('option');
                option.value = province.id;
                option.textContent = province.name;
                option.className = 'text-black bg-white';
                select.appendChild(option);
            });

            if (savedProvinceId) {
                select.value = savedProvinceId;
                document.getElementById('province_name').value = select.options[select.selectedIndex]?.textContent || '';
                loadCities(savedProvinceId, savedCityId);
            }
        });

    function loadCities(provinceId, preselectCityId = null) {
        citySelect.innerHTML = '<option value="" disabled selected>City</option>';

        fetch(`/uaswebii/public/api/cities/${provinceId}`)
            .then(res => res.json())
            .then(data => {
                data.data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    option.className = 'text-black bg-white';
                    citySelect.appendChild(option);
                });

                if (preselectCityId) {
                    citySelect.value = preselectCityId;
                    document.getElementById('city_name').value = citySelect.options[citySelect.selectedIndex]?.textContent || '';
                }
            });
    }

    document.getElementById('province_select').addEventListener('change', function () {
        document.getElementById('province_name').value = this.options[this.selectedIndex].textContent;
        loadCities(this.value);
    });

    citySelect.addEventListener('change', function () {
        document.getElementById('city_name').value = this.options[this.selectedIndex].textContent;
    });
</script>

<script>
    const showBtn = document.getElementById('showBtn');
    const hideBtn = document.getElementById('hideBtn');
    const myDiv = document.getElementById('myDiv');

    showBtn.addEventListener('click', () => {
        myDiv.classList.remove('hidden');
    });

    hideBtn.addEventListener('click', () => {
        myDiv.classList.add('hidden');
    });
</script>