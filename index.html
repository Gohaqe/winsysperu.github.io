<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Operaciones</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f0f2f5; }
        .card-enter { opacity: 0; transform: translateY(20px); animation: card-enter-animation 0.5s forwards; }
        @keyframes card-enter-animation { to { opacity: 1; transform: translateY(0); } }
        #loading-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(240, 242, 245, 0.8); display: flex; justify-content: center; align-items: center; z-index: 9999; transition: opacity 0.3s; }
        .modal { display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); transition: opacity 0.3s ease; }
        .modal-content { background-color: #fefefe; margin: 10% auto; padding: 24px; border: 1px solid #888; width: 90%; max-width: 600px; border-radius: 12px; position: relative; }
        .nav-button { padding: 8px 16px; border-radius: 8px; font-weight: 500; transition: background-color 0.2s, color 0.2s; cursor: pointer; }
        .nav-button.active { background-color: #3b82f6; color: white; }
        .nav-button:not(.active) { background-color: #e5e7eb; color: #374151; }
    </style>
</head>
<body class="text-gray-800">

    <div id="loading-overlay">
        <div class="text-center">
            <i data-lucide="loader-2" class="animate-spin h-12 w-12 text-blue-600"></i>
            <p class="mt-4 text-lg font-semibold text-gray-700">Cargando datos...</p>
        </div>
    </div>

    <div class="container mx-auto p-4 md:p-8">

        <header class="mb-6 flex flex-wrap justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Dashboard de Operaciones</h1>
                <p class="text-gray-500">Análisis interactivo de la operación.</p>
            </div>
            <div class="flex space-x-2 mt-4 md:mt-0">
                <button id="nav-flota" class="nav-button active">Maquinas</button>
                <button id="nav-tecnicos" class="nav-button">Técnicos</button>
            </div>
        </header>

        <!-- SECCIÓN DE FILTROS -->
        <div class="bg-white p-4 rounded-xl shadow-md mb-8 flex flex-wrap items-end gap-4">
            <div class="flex-grow">
                <label for="start-date" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" id="start-date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="flex-grow">
                <label for="end-date" class="block text-sm font-medium text-gray-700">Fecha Fin</label>
                <input type="date" id="end-date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div id="gabinete-filter-container" class="flex-grow">
                <label for="type-filter" class="block text-sm font-medium text-gray-700">Tipo de Gabinete</label>
                <select id="type-filter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option>Todos</option>
                </select>
            </div>
            <div id="tecnico-filter-container" class="flex-grow hidden">
                <label class="block text-sm font-medium text-gray-700">Técnicos</label>
                <div class="relative mt-1">
                    <button id="tecnico-filter-btn" class="w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default">
                        <span id="tecnico-filter-text" class="block truncate">Todos los técnicos</span>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"><i data-lucide="chevrons-up-down" class="h-5 w-5 text-gray-400"></i></span>
                    </button>
                    <div id="tecnico-filter-options" class="hidden absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto">
                    </div>
                </div>
            </div>
            <button id="apply-filters" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 flex items-center gap-2">
                <i data-lucide="filter" class="w-4 h-4"></i> Aplicar
            </button>
        </div>

        <!-- DASHBOARD DE FLOTA -->
        <div id="flota-dashboard">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
                <div class="lg:col-span-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="card-enter bg-white p-6 rounded-xl shadow-md flex items-center space-x-4"><div class="bg-blue-100 p-3 rounded-full"><i data-lucide="server" class="text-blue-600"></i></div><div><p class="text-gray-500 text-sm">Total de Visitas</p><p id="total-maquinas" class="text-2xl font-bold">0</p></div></div>
                        <div class="card-enter bg-white p-6 rounded-xl shadow-md flex items-center space-x-4"><div class="bg-green-100 p-3 rounded-full"><i data-lucide="check-circle" class="text-green-600"></i></div><div><p class="text-gray-500 text-sm">Operativas</p><p id="total-operativas" class="text-2xl font-bold">0</p></div></div>
                        <div id="card-inoperativas" class="card-enter bg-white p-6 rounded-xl shadow-md flex items-center space-x-4 hover:bg-red-50 cursor-pointer transition"><div class="bg-red-100 p-3 rounded-full"><i data-lucide="alert-triangle" class="text-red-600"></i></div><div><p class="text-gray-500 text-sm">Inoperativas</p><p id="total-inoperativas" class="text-2xl font-bold">0</p></div></div>
                        <div id="card-pendientes" class="card-enter bg-white p-6 rounded-xl shadow-md flex items-center space-x-4 hover:bg-yellow-50 cursor-pointer transition"><div class="bg-yellow-100 p-3 rounded-full"><i data-lucide="clock" class="text-yellow-600"></i></div><div><p class="text-gray-500 text-sm">Pendientes</p><p id="total-pendientes" class="text-2xl font-bold">0</p></div></div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h2 class="text-xl font-semibold mb-4">Top 15 Salas Más Visitadas</h2><div class="h-96"><canvas id="topSalasChart"></canvas></div></div>
                <div class="bg-white p-6 rounded-xl shadow-md"><h2 class="text-xl font-semibold mb-4">Distribución de Estados</h2><div class="h-96"><canvas id="estadoMaquinasChart"></canvas></div></div>
            </div>
        </div>

        <!-- DASHBOARD DE TÉCNICOS -->
        <div id="tecnicos-dashboard" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md"><h2 class="text-xl font-semibold mb-4">Horas Trabajadas por Técnico</h2><div class="h-96"><canvas id="horasTecnicoChart"></canvas></div></div>
                <div class="bg-white p-6 rounded-xl shadow-md"><h2 class="text-xl font-semibold mb-4">Tiempo Promedio por Tipo de Trabajo (Minutos)</h2><div class="h-96"><canvas id="avgTimeChart"></canvas></div></div>
                <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h2 class="text-xl font-semibold mb-4">Visitas a Salas por Técnico</h2><div id="visitasTecnicoContainer" class="max-h-96 overflow-y-auto"></div></div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div id="details-modal" class="modal"><div class="modal-content"><div class="flex justify-between items-center mb-4"><h2 id="modal-title" class="text-2xl font-bold">Detalle</h2><button id="modal-close-btn" class="text-gray-500 hover:text-gray-800"><i data-lucide="x" class="w-6 h-6"></i></button></div><div id="modal-body" class="max-h-96 overflow-y-auto"></div></div></div>

    <script>
        // --- CONFIG & GLOBAL VARS ---
        const SUPABASE_URL = 'https://qobquktxvhlvtrpeopji.supabase.co';
        const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InFvYnF1a3R4dmhsdnRycGVvcGppIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU2OTc4NDYsImV4cCI6MjA2MTI3Mzg0Nn0.rnubNUWSWEomj5Xwvr65kZLK7Ig_bLC74ajFh9cksFc';
        const supabaseClient = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

        // --- DOM ELEMENTS ---
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        const typeFilterInput = document.getElementById('type-filter');
        const applyFiltersBtn = document.getElementById('apply-filters');
        const navFlotaBtn = document.getElementById('nav-flota');
        const navTecnicosBtn = document.getElementById('nav-tecnicos');
        const flotaDashboard = document.getElementById('flota-dashboard');
        const tecnicosDashboard = document.getElementById('tecnicos-dashboard');
        const gabineteFilterContainer = document.getElementById('gabinete-filter-container');
        const tecnicoFilterContainer = document.getElementById('tecnico-filter-container');
        const tecnicoFilterBtn = document.getElementById('tecnico-filter-btn');
        const tecnicoFilterText = document.getElementById('tecnico-filter-text');
        const tecnicoFilterOptions = document.getElementById('tecnico-filter-options');
        const detailsModal = document.getElementById('details-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        const modalCloseBtn = document.getElementById('modal-close-btn');

        // --- STATE & CHART INSTANCES ---
        let estadoMaquinasChartInstance, topSalasChartInstance, horasTecnicoChartInstance, avgTimeChartInstance;
        let currentMachineStates = [];
        let allTechnicians = [];
        
        const colorPalette = ['rgba(59, 130, 246, 0.7)', 'rgba(239, 68, 68, 0.7)', 'rgba(245, 158, 11, 0.7)', 'rgba(34, 197, 94, 0.7)', 'rgba(139, 92, 246, 0.7)', 'rgba(236, 72, 153, 0.7)', 'rgba(14, 165, 233, 0.7)'];

        // --- HELPER & INIT FUNCTIONS ---
        function setDefaultDates() {
            const today = new Date();
            const thirtyDaysAgo = new Date();
            thirtyDaysAgo.setDate(today.getDate() - 30);
            endDateInput.value = today.toISOString().split('T')[0];
            startDateInput.value = thirtyDaysAgo.toISOString().split('T')[0];
        }

        async function populateGabineteFilter() {
            const { data, error } = await supabaseClient.from('maquinas').select('gabinete');
            if (error) { console.error('Error fetching gabinetes:', error); return; }
            const distinctGabinetes = [...new Set(data.map(item => item.gabinete).filter(Boolean))];
            distinctGabinetes.sort();
            distinctGabinetes.forEach(gabinete => {
                const option = document.createElement('option');
                option.value = gabinete;
                option.textContent = gabinete;
                typeFilterInput.appendChild(option);
            });
        }

        async function populateTechnicianFilter() {
            const { data, error } = await supabaseClient.from('tecnicos').select('id_usuario, usuario').order('usuario');
            if (error) { console.error('Error fetching technicians:', error); return; }
            allTechnicians = data;
            
            tecnicoFilterOptions.innerHTML = ''; 
            
            const allOptionLabel = document.createElement('label');
            allOptionLabel.className = 'flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer font-semibold';
            allOptionLabel.innerHTML = `<input type="checkbox" id="select-all-technicians" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-3"> Todos`;
            tecnicoFilterOptions.appendChild(allOptionLabel);

            allTechnicians.forEach(tech => {
                const label = document.createElement('label');
                label.className = 'flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer';
                label.innerHTML = `<input type="checkbox" data-id="${tech.id_usuario}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-3 technician-checkbox"> ${tech.usuario}`;
                tecnicoFilterOptions.appendChild(label);
            });
            
            document.getElementById('select-all-technicians').addEventListener('change', (e) => {
                document.querySelectorAll('.technician-checkbox').forEach(cb => cb.checked = e.target.checked);
                updateTechnicianFilterText();
            });
        }
        
        function getSelectedTechnicianIds() {
            const selected = [];
            document.querySelectorAll('.technician-checkbox:checked').forEach(cb => {
                selected.push(cb.dataset.id); 
            });
            if (selected.length === 0 || selected.length === allTechnicians.length) {
                return [];
            }
            return selected;
        }

        function updateTechnicianFilterText() {
            const selectedCount = getSelectedTechnicianIds().length;
            if (selectedCount === 0 || selectedCount === allTechnicians.length) {
                tecnicoFilterText.textContent = 'Todos los técnicos';
            } else if (selectedCount === 1) {
                const selectedId = getSelectedTechnicianIds()[0];
                const tech = allTechnicians.find(t => t.id_usuario === selectedId);
                tecnicoFilterText.textContent = tech ? tech.usuario : '1 seleccionado';
            } else {
                tecnicoFilterText.textContent = `${selectedCount} técnicos seleccionados`;
            }
        }

        // --- DATA FETCHING (FLOTA) ---
        async function fetchTopSalas(startDate, endDate, typeFilter) {
            let query = supabaseClient.from('trabajos').select('id_sala, detalle!inner(maquinas!inner(gabinete))').gte('fecha', startDate).lte('fecha', endDate);
            if (typeFilter !== 'Todos') { query = query.ilike('detalle.maquinas.gabinete', `%${typeFilter}%`); }
            const { data: trabajosData, error: trabajosError } = await query;
            if (trabajosError) throw trabajosError;
            if (!trabajosData || trabajosData.length === 0) return [];
            const salaIds = [...new Set(trabajosData.map(t => t.id_sala).filter(id => id != null))];
            if (salaIds.length === 0) return [];
            const { data: salasData, error: salasError } = await supabaseClient.from('sala').select('id_sala, sala_mincetur').in('id_sala', salaIds);
            if (salasError) throw salasError;
            const salaVisits = trabajosData.reduce((acc, trabajo) => { if (trabajo.id_sala) { acc[trabajo.id_sala] = (acc[trabajo.id_sala] || 0) + 1; } return acc; }, {});
            const salaMap = salasData.reduce((acc, sala) => { acc[sala.id_sala] = sala.sala_mincetur; return acc; }, {});
            return Object.entries(salaVisits).map(([id_sala, visitas]) => ({ nombre_sala: salaMap[id_sala] || `Sala ID ${id_sala}`, visitas: visitas })).sort((a, b) => b.visitas - a.visitas).slice(0, 15);
        }

        async function fetchMachineStates(startDate, endDate, typeFilter) {
            const { data: trabajosData, error: trabajosError } = await supabaseClient.from('trabajos').select('id_trabajo, fecha, hora_fin, id_sala').gte('fecha', startDate).lte('fecha', endDate);
            if (trabajosError) throw trabajosError; if (!trabajosData || trabajosData.length === 0) return [];
            const trabajoIds = trabajosData.map(t => t.id_trabajo);
            const { data: detailsData, error: detailsError } = await supabaseClient.from('detalle').select('id_trabajo, id_maquina, estado, tipo_trabajo, diag_ini, trab_realizado, resul').in('id_trabajo', trabajoIds).not('id_maquina', 'is', null);
            if (detailsError) throw detailsError; if (!detailsData || detailsData.length === 0) return [];
            const trabajoInfoMap = trabajosData.reduce((acc, t) => { acc[t.id_trabajo] = { date: new Date(`${t.fecha}T${t.hora_fin || '00:00:00'}`), id_sala: t.id_sala }; return acc; }, {});
            const latestDetails = {};
            for (const detail of detailsData) {
                const machineId = detail.id_maquina;
                const trabajoInfo = trabajoInfoMap[detail.id_trabajo];
                if (!trabajoInfo) continue;
                if (!latestDetails[machineId] || trabajoInfo.date > latestDetails[machineId].date) {
                    const fullDescription = [detail.diag_ini, detail.trab_realizado, detail.resul].filter(Boolean).join(' / ');
                    latestDetails[machineId] = { estado: detail.estado, id_maquina: machineId, date: trabajoInfo.date, id_sala: trabajoInfo.id_sala, motivo: detail.tipo_trabajo, descripcion: fullDescription };
                }
            }
            const machineIds = Object.keys(latestDetails); if (machineIds.length === 0) return [];
            const salaIds = [...new Set(Object.values(latestDetails).map(d => d.id_sala).filter(id => id != null))];
            let salaMap = {};
            if (salaIds.length > 0) {
                const { data: salasData, error: salasError } = await supabaseClient.from('sala').select('id_sala, sala_mincetur').in('id_sala', salaIds);
                if (salasError) throw salasError;
                salaMap = salasData.reduce((acc, sala) => { acc[sala.id_sala] = sala.sala_mincetur; return acc; }, {});
            }
            let query = supabaseClient.from('maquinas').select('id_maquina, serie, modelo, gabinete').in('id_maquina', machineIds);
            if (typeFilter !== 'Todos') { query = query.ilike('gabinete', `%${typeFilter}%`); }
            const { data: maquinasData, error: maquinasError } = await query;
            if (maquinasError) throw maquinasError;
            return maquinasData.map(machine => { const details = latestDetails[machine.id_maquina]; return { serie: machine.serie, modelo: machine.modelo, gabinete: machine.gabinete, estado: details.estado, fecha: details.date, sala: salaMap[details.id_sala] || 'Sala desconocida', motivo: details.motivo, descripcion: details.descripcion }; });
        }
        
        // --- LÓGICA PRINCIPAL ---
        async function applyFilters() {
            const loadingOverlay = document.getElementById('loading-overlay');
            loadingOverlay.style.display = 'flex';
            loadingOverlay.style.opacity = '1';

            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
            const activeDashboard = navFlotaBtn.classList.contains('active') ? 'flota' : 'tecnicos';

            try {
                if (activeDashboard === 'flota') {
                    const typeFilter = typeFilterInput.value;
                    const [machineStatesData, topSalasData] = await Promise.all([
                        fetchMachineStates(startDate, endDate, typeFilter),
                        fetchTopSalas(startDate, endDate, typeFilter)
                    ]);
                    currentMachineStates = machineStatesData;
                    updateMachineStatesUI(machineStatesData);
                    updateTopSalasUI(topSalasData);
                } else {
                    const technicianIds = getSelectedTechnicianIds();
                    const params = { start_date: startDate, end_date: endDate, technician_ids_filter: technicianIds };
                    
                    const [hoursData, avgTimeData, visitsData] = await Promise.all([
                        supabaseClient.rpc('get_hours_by_technician', params),
                        supabaseClient.rpc('get_avg_time_by_work_type', params),
                        supabaseClient.rpc('get_visits_by_technician', params)
                    ]);
                    if (hoursData.error) throw hoursData.error;
                    if (avgTimeData.error) throw avgTimeData.error;
                    if (visitsData.error) throw visitsData.error;
                    updateTechniciansUI(hoursData.data, avgTimeData.data, visitsData.data);
                }
            } catch (error) {
                console.error('Error al aplicar filtros:', error);
                alert(`Error al cargar datos: ${error.message}`);
            } finally {
                loadingOverlay.style.opacity = '0';
                setTimeout(() => loadingOverlay.style.display = 'none', 300);
            }
        }

        // --- UI UPDATES: FLOTA ---
        function updateMachineStatesUI(data) {
            document.getElementById('total-maquinas').textContent = data.length;
            document.getElementById('total-operativas').textContent = data.filter(m => m.estado === 'Operativo').length;
            document.getElementById('total-inoperativas').textContent = data.filter(m => m.estado === 'Inoperativo').length;
            document.getElementById('total-pendientes').textContent = data.filter(m => m.estado === 'Pendiente').length;
            const ctx = document.getElementById('estadoMaquinasChart').getContext('2d');
            if (estadoMaquinasChartInstance) estadoMaquinasChartInstance.destroy();
            estadoMaquinasChartInstance = new Chart(ctx, { type: 'doughnut', data: { labels: ['Operativas', 'Inoperativas', 'Pendientes'], datasets: [{ data: [data.filter(m => m.estado === 'Operativo').length, data.filter(m => m.estado === 'Inoperativo').length, data.filter(m => m.estado === 'Pendiente').length], backgroundColor: ['#22c55e', '#ef4444', '#f59e0b'], borderColor: '#f0f2f5', borderWidth: 4, }] }, options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: { position: 'bottom' } } } });
        }
        function updateTopSalasUI(data) {
            const labels = data.map(s => s.nombre_sala);
            const visitas = data.map(s => s.visitas);
            const backgroundColors = labels.map((_, index) => colorPalette[index % colorPalette.length]);
            const ctx = document.getElementById('topSalasChart').getContext('2d');
            if (topSalasChartInstance) topSalasChartInstance.destroy();
            topSalasChartInstance = new Chart(ctx, { type: 'bar', data: { labels: labels, datasets: [{ label: 'Número de Visitas', data: visitas, backgroundColor: backgroundColors, }] }, options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { x: { beginAtZero: true } } } });
        }
        function showDetailsModal(status) {
            const filteredMachines = currentMachineStates.filter(m => m.estado === status);
            filteredMachines.sort((a, b) => b.fecha - a.fecha);
            modalTitle.textContent = `Detalle de Máquinas ${status}`;
            modalBody.innerHTML = '';
            if (filteredMachines.length === 0) { modalBody.innerHTML = `<p class="text-gray-500">No hay máquinas en estado "${status}".</p>`; } else {
                const list = document.createElement('ul');
                list.className = 'space-y-3';
                filteredMachines.forEach(machine => {
                    const item = document.createElement('li');
                    item.className = 'p-3 border-b';
                    const formattedDate = machine.fecha.toLocaleDateString('es-PE', { year: 'numeric', month: 'long', day: 'numeric' });
                    item.innerHTML = `<div class="flex justify-between items-start"><div><p class="font-bold text-lg text-gray-800">${machine.serie}</p><p class="text-sm text-gray-600">${machine.modelo || 'Sin modelo'}</p></div><p class="text-sm text-gray-500 flex-shrink-0 ml-4">${formattedDate}</p></div><div class="mt-2 text-sm space-y-1"><p><span class="font-semibold">Sala:</span> ${machine.sala}</p><p><span class="font-semibold">Tipo de Trabajo:</span> ${machine.motivo || 'No especificado'}</p><p><span class="font-semibold">Descripción:</span> ${machine.descripcion || 'No disponible'}</p></div>`;
                    list.appendChild(item);
                });
                modalBody.appendChild(list);
            }
            detailsModal.style.display = 'block';
        }

        // --- UI UPDATES: TÉCNICOS ---
        function updateTechniciansUI(hoursData, avgTimeData, visitsData) {
            const horasCtx = document.getElementById('horasTecnicoChart').getContext('2d');
            if (horasTecnicoChartInstance) horasTecnicoChartInstance.destroy();
            horasTecnicoChartInstance = new Chart(horasCtx, { type: 'bar', data: { labels: hoursData.map(d => d.tecnico_nombre), datasets: [{ label: 'Horas Totales', data: hoursData.map(d => parseFloat(d.total_horas).toFixed(2)), backgroundColor: colorPalette.map(c => c.replace('0.7', '0.8')), }] }, options: { responsive: true, maintainAspectRatio: false, indexAxis: 'y', plugins: { legend: { display: false } } } });

            const avgTimeCtx = document.getElementById('avgTimeChart').getContext('2d');
            if (avgTimeChartInstance) avgTimeChartInstance.destroy();
            avgTimeChartInstance = new Chart(avgTimeCtx, { type: 'bar', data: { labels: avgTimeData.map(d => d.tipo_trabajo), datasets: [{ label: 'Minutos Promedio', data: avgTimeData.map(d => parseFloat(d.avg_minutos).toFixed(2)), backgroundColor: colorPalette.slice().reverse().map(c => c.replace('0.7', '0.8')), }] }, options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } } });

            const visitsContainer = document.getElementById('visitasTecnicoContainer');
            visitsContainer.innerHTML = '';
            const visitsByTechnician = visitsData.reduce((acc, visit) => { if (!acc[visit.tecnico_nombre]) acc[visit.tecnico_nombre] = []; acc[visit.tecnico_nombre].push(visit); return acc; }, {});
            if (Object.keys(visitsByTechnician).length === 0) { visitsContainer.innerHTML = '<p class="text-gray-500 text-center">No hay datos de visitas.</p>'; } else {
                for (const tecnico in visitsByTechnician) {
                    const techDiv = document.createElement('div');
                    techDiv.className = 'mb-4 p-3 border rounded-lg bg-gray-50';
                    let listHtml = `<h3 class="font-semibold text-lg mb-2">${tecnico}</h3><ul class="list-disc pl-5 space-y-1">`;
                    visitsByTechnician[tecnico].forEach(visit => { listHtml += `<li>${visit.sala_nombre}: <span class="font-bold">${visit.visitas} visitas</span></li>`; });
                    listHtml += '</ul>';
                    techDiv.innerHTML = listHtml;
                    visitsContainer.appendChild(techDiv);
                }
            }
        }
        
        // --- INICIALIZACIÓN ---
        document.addEventListener('DOMContentLoaded', async () => {
            function switchView(view) {
                if (view === 'flota') {
                    navFlotaBtn.classList.add('active');
                    navTecnicosBtn.classList.remove('active');
                    flotaDashboard.classList.remove('hidden');
                    tecnicosDashboard.classList.add('hidden');
                    gabineteFilterContainer.style.display = 'block';
                    tecnicoFilterContainer.style.display = 'none';
                } else {
                    navFlotaBtn.classList.remove('active');
                    navTecnicosBtn.classList.add('active');
                    flotaDashboard.classList.add('hidden');
                    tecnicosDashboard.classList.remove('hidden');
                    gabineteFilterContainer.style.display = 'none';
                    tecnicoFilterContainer.style.display = 'block';
                }
                applyFilters();
            }

            navFlotaBtn.addEventListener('click', () => switchView('flota'));
            navTecnicosBtn.addEventListener('click', () => switchView('tecnicos'));

            setDefaultDates();
            await Promise.all([populateGabineteFilter(), populateTechnicianFilter()]);
            lucide.createIcons();
            applyFilters();
            applyFiltersBtn.addEventListener('click', applyFilters);
            
            tecnicoFilterBtn.addEventListener('click', () => tecnicoFilterOptions.classList.toggle('hidden'));
            tecnicoFilterOptions.addEventListener('change', updateTechnicianFilterText);
            document.addEventListener('click', (e) => { if (!tecnicoFilterContainer.contains(e.target)) { tecnicoFilterOptions.classList.add('hidden'); } });

            document.getElementById('card-inoperativas').addEventListener('click', () => showDetailsModal('Inoperativo'));
            document.getElementById('card-pendientes').addEventListener('click', () => showDetailsModal('Pendiente'));
            modalCloseBtn.addEventListener('click', () => detailsModal.style.display = 'none');
            window.addEventListener('click', (event) => { if (event.target == detailsModal) { detailsModal.style.display = 'none'; } });
        });
    </script>
</body>
</html>
