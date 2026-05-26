<x-app-layout>
    <x-slot name="header">
        Ringkasan Aktivitas
    </x-slot>

    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-navy-900 to-navy-800 rounded-3xl p-8 text-white mb-8 shadow-xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-uhbblue-500 rounded-full blur-3xl mix-blend-screen opacity-20 -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-uhbamber-500 rounded-full blur-3xl mix-blend-screen opacity-20 transform -translate-x-1/2 -mb-20"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="text-3xl font-bold mb-2">Selamat datang kembali, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-navy-200 text-lg">Berikut adalah ringkasan aktivitas dan event terkini Anda.</p>
            </div>
            <a href="#" class="px-6 py-3 bg-white text-navy-900 font-bold rounded-xl hover:bg-navy-50 transition shadow-lg shrink-0">
                Buat Event Baru
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <span id="trend-events" class="flex items-center gap-1 text-sm font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    <span>12%</span>
                </span>
            </div>
            <h3 class="text-navy-500 text-sm font-semibold mb-1">Total Event Aktif</h3>
            <div id="stat-events" class="text-3xl font-black text-navy-900">24</div>
        </div        <!-- Stat 2 -->
        <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-uhbamber-50 text-uhbamber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span id="trend-registrants" class="flex items-center gap-1 text-sm font-bold text-uhbamber-500 bg-uhbamber-50 px-2 py-1 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    <span>18%</span>
                </span>
            </div>
            <h3 class="text-navy-500 text-sm font-semibold mb-1">Total Pendaftar</h3>
            <div id="stat-registrants" class="text-3xl font-black text-navy-900">5,310</div>
        </div>
 
        <!-- Stat 3 -->
        <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <span id="trend-certificates" class="flex items-center gap-1 text-sm font-bold text-uhbamber-500 bg-uhbamber-50 px-2 py-1 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    <span>24%</span>
                </span>
            </div>iv>
            <h3 class="text-navy-500 text-sm font-semibold mb-1">Sertifikat Diterbitkan</h3>
            <div id="stat-certificates" class="text-3xl font-black text-navy-900">4,940</div>
        </div>

        <!-- Stat 4 -->
        <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span id="trend-organizations" class="flex items-center gap-1 text-sm font-bold text-red-500 bg-red-50 px-2 py-1 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    <span>2%</span>
                </span>
            </div>
            <h3 class="text-navy-500 text-sm font-semibold mb-1">Organisasi Aktif</h3>
            <div id="stat-organizations" class="text-3xl font-black text-navy-900">20</div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Chart Section -->
        <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-navy-100 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-navy-900">Statistik Partisipasi Event</h3>
                <select id="timeframeFilter" class="bg-navy-50 border-none rounded-lg text-sm text-navy-700 font-semibold focus:ring-0 cursor-pointer">
                    <option value="year">Tahun Ini</option>
                    <option value="month">Bulan Ini</option>
                </select>
            </div>
            <div class="relative h-80 w-full">
                <canvas id="participationChart"></canvas>
            </div>
        </div>

        <!-- Recent Events / List -->
        <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-navy-900">Event Mendatang</h3>
                <a href="#" class="text-sm font-bold text-uhbblue-600 hover:text-uhbblue-700">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                <!-- Event Item 1 -->
                <div class="group flex gap-4 p-3 rounded-2xl hover:bg-navy-50 transition border border-transparent hover:border-navy-100 cursor-pointer">
                    <div class="w-14 h-14 rounded-xl bg-uhbblue-100 flex flex-col items-center justify-center shrink-0">
                        <span class="text-xs font-bold text-uhbblue-600 uppercase">Okt</span>
                        <span class="text-lg font-black text-uhbblue-900 leading-none">24</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-navy-900 mb-1 group-hover:text-uhbblue-600 transition line-clamp-1">Tech Conference 2026</h4>
                        <div class="text-xs text-navy-500 flex items-center gap-2">
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 08:00 WIB</span>
                            <span class="w-1 h-1 rounded-full bg-navy-300"></span>
                            <span class="font-semibold text-uhbamber-600">Aktif</span>
                        </div>
                    </div>
                </div>

                <!-- Event Item 2 -->
                <div class="group flex gap-4 p-3 rounded-2xl hover:bg-navy-50 transition border border-transparent hover:border-navy-100 cursor-pointer">
                    <div class="w-14 h-14 rounded-xl bg-uhbamber-100 flex flex-col items-center justify-center shrink-0">
                        <span class="text-xs font-bold text-uhbamber-600 uppercase">Nov</span>
                        <span class="text-lg font-black text-uhbamber-900 leading-none">02</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-navy-900 mb-1 group-hover:text-uhbblue-600 transition line-clamp-1">Bootcamp Laravel & React</h4>
                        <div class="text-xs text-navy-500 flex items-center gap-2">
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 13:00 WIB</span>
                            <span class="w-1 h-1 rounded-full bg-navy-300"></span>
                            <span class="font-semibold text-uhbamber-600">Aktif</span>
                        </div>
                    </div>
                </div>

                <!-- Event Item 3 -->
                <div class="group flex gap-4 p-3 rounded-2xl hover:bg-navy-50 transition border border-transparent hover:border-navy-100 cursor-pointer opacity-70">
                    <div class="w-14 h-14 rounded-xl bg-purple-100 flex flex-col items-center justify-center shrink-0">
                        <span class="text-xs font-bold text-purple-600 uppercase">Nov</span>
                        <span class="text-lg font-black text-purple-900 leading-none">15</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-navy-900 mb-1 group-hover:text-uhbblue-600 transition line-clamp-1">LDKM UHB 2026</h4>
                        <div class="text-xs text-navy-500 flex items-center gap-2">
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 07:00 WIB</span>
                            <span class="w-1 h-1 rounded-full bg-navy-300"></span>
                            <span class="font-semibold text-orange-500">Draft</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="w-full mt-4 py-3 rounded-xl border-2 border-dashed border-navy-200 text-navy-600 font-bold hover:bg-navy-50 hover:border-uhbblue-400 hover:text-uhbblue-600 transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Event
            </button>
        </div>
    </div>

    <!-- Setup Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('participationChart').getContext('2d');
            
            // Gradient for chart
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)'); // uhbblue-500
            gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

            let gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
            gradient2.addColorStop(0, 'rgba(251, 191, 36, 0.5)'); // uhbamber-400
            gradient2.addColorStop(1, 'rgba(251, 191, 36, 0.0)');

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [
                        {
                            label: 'Peserta',
                            data: [120, 190, 300, 250, 420, 380, 500, 450, 600, 550, 700, 850],
                            borderColor: '#3b82f6', // uhbblue-500
                            backgroundColor: gradient,
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#3b82f6',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Sertifikat',
                            data: [100, 150, 280, 200, 380, 350, 480, 420, 580, 520, 680, 800],
                            borderColor: '#fbbf24', // uhbamber-400
                            backgroundColor: gradient2,
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#fbbf24',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: "'Poppins', sans-serif",
                                    size: 12,
                                    weight: '600'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: '#102a43',
                            titleFont: { family: "'Poppins', sans-serif", size: 13 },
                            bodyFont: { family: "'Poppins', sans-serif", size: 13 },
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: true
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                font: {
                                    family: "'Inter', sans-serif",
                                    size: 12
                                },
                                color: '#829ab1'
                            }
                        },
                        y: {
                            grid: {
                                borderDash: [5, 5],
                                color: '#f0f4f8',
                                drawBorder: false
                            },
                            ticks: {
                                font: {
                                    family: "'Inter', sans-serif",
                                    size: 12
                                },
                                color: '#829ab1',
                                padding: 10
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                }
            });

            // Smooth number counter animation
            function animateValue(id, start, end, duration) {
                if (start === end) return;
                const obj = document.getElementById(id);
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    const currentValue = Math.floor(progress * (end - start) + start);
                    obj.innerHTML = currentValue.toLocaleString('en-US');
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            // Event listener for timeframe select
            const timeframeFilter = document.getElementById('timeframeFilter');
            timeframeFilter.addEventListener('change', function(e) {
                const timeframe = e.target.value;
                let newLabels, newPesertaData, newSertifikatData;
                let targetEvents, targetRegistrants, targetCertificates, targetOrganizations;
                let trendEventsHtml, trendRegistrantsHtml, trendCertificatesHtml, trendOrganizationsHtml;

                if (timeframe === 'month') {
                    // Monthly data (May 2026)
                    newLabels = ['Mgg 1', 'Mgg 2', 'Mgg 3', 'Mgg 4'];
                    newPesertaData = [90, 110, 130, 90]; // Sum = 420 (aligns with May's value in yearly chart!)
                    newSertifikatData = [80, 100, 120, 80]; // Sum = 380 (aligns with May's value in yearly chart!)
                    
                    targetEvents = 4;
                    targetRegistrants = 420;
                    targetCertificates = 380;
                    targetOrganizations = 12;

                    trendEventsHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>8%</span>
                    `;
                    trendRegistrantsHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>15%</span>
                    `;
                    trendCertificatesHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>10%</span>
                    `;
                    trendOrganizationsHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>5%</span>
                    `;
                    
                    // Update trend styles to green/success for all
                    document.getElementById('trend-organizations').className = "flex items-center gap-1 text-sm font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg";
                } else {
                    // Yearly data
                    newLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
                    newPesertaData = [120, 190, 300, 250, 420, 380, 500, 450, 600, 550, 700, 850];
                    newSertifikatData = [100, 150, 280, 200, 380, 350, 480, 420, 580, 520, 680, 800];
                    
                    targetEvents = 24;
                    targetRegistrants = 5310;
                    targetCertificates = 4940;
                    targetOrganizations = 20;

                    trendEventsHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>12%</span>
                    `;
                    trendRegistrantsHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>18%</span>
                    `;
                    trendCertificatesHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>24%</span>
                    `;
                    trendOrganizationsHtml = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                        <span>2%</span>
                    `;
                    
                    // Update trend styles for organization to red/danger
                    document.getElementById('trend-organizations').className = "flex items-center gap-1 text-sm font-bold text-red-500 bg-red-50 px-2 py-1 rounded-lg";
                }

                // Update Chart
                chart.data.labels = newLabels;
                chart.data.datasets[0].data = newPesertaData;
                chart.data.datasets[1].data = newSertifikatData;
                chart.update();

                // Update Trends
                document.getElementById('trend-events').innerHTML = trendEventsHtml;
                document.getElementById('trend-registrants').innerHTML = trendRegistrantsHtml;
                document.getElementById('trend-certificates').innerHTML = trendCertificatesHtml;
                document.getElementById('trend-organizations').innerHTML = trendOrganizationsHtml;

                // Animate Stats Cards
                animateValue('stat-events', parseInt(document.getElementById('stat-events').innerText.replace(/,/g, '')), targetEvents, 500);
                animateValue('stat-registrants', parseInt(document.getElementById('stat-registrants').innerText.replace(/,/g, '')), targetRegistrants, 500);
                animateValue('stat-certificates', parseInt(document.getElementById('stat-certificates').innerText.replace(/,/g, '')), targetCertificates, 500);
                animateValue('stat-organizations', parseInt(document.getElementById('stat-organizations').innerText.replace(/,/g, '')), targetOrganizations, 500);
            });
        });
    </script>
</x-app-layout>
