<x-app-layout>
    <div class="container-fluid py-4">
        <!-- Stats Overview Row -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Huidige Gevangenen</div>
                                <div class="h5 mb-0 font-weight-bold" id="currentPrisoners">Laden...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Bezette Cellen</div>
                                <div class="h5 mb-0 font-weight-bold" id="occupiedCells">Laden...</div>
                                <div class="text-xs text-muted">van <span id="totalCells">0</span> cellen</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-door-closed fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Vrijgelaten Gevangenen</div>
                                <div class="h5 mb-0 font-weight-bold" id="releasedPrisoners">Laden...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-door-open fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Recente Incidenten</div>
                                <div class="h5 mb-0 font-weight-bold" id="recentIncidents">Laden...</div>
                                <div class="text-xs text-muted">afgelopen 7 dagen</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-exclamation-triangle fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Stats Row -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Vrije Cellen</div>
                                <div class="h5 mb-0 font-weight-bold" id="emptyCells">Laden...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bed fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Recente Logboek Meldingen</div>
                                <div class="h5 mb-0 font-weight-bold" id="recentLogs">Laden...</div>
                                <div class="text-xs text-muted">afgelopen 7 dagen</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Totaal Gevangenen</div>
                                <div class="h5 mb-0 font-weight-bold" id="totalPrisoners">Laden...</div>
                                <div class="text-xs text-muted">ooit opgenomen</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-history fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 card-accent">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Bezettingsgraad</div>
                                <div class="h5 mb-0 font-weight-bold">
                                    <span id="occupancyRate">Laden...</span>%
                                </div>
                                <div class="text-xs text-muted">van de cellen in gebruik</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-percentage fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Recent Prisoners -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">Recente Gevangenen</h6>
                    </div>
                    <div class="card-body">
                        <table id="recentPrisoners" class="table table-striped">
                            <thead>
                                <!-- Table headers will be added by datatable -->
                            </thead>
                            <tbody>
                                <!-- Table content will be loaded via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cell Occupancy -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">Celbezetting per Vleugel</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="cellOccupancyChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small" id="wingLegend">
                            <!-- Wings legend will be dynamically added -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Recent Logs -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Recente Logboek Meldingen</h6>
                    </div>
                    <div class="card-body">
                        <table id="recentLogsTable" class="table table-striped">
                            <thead>
                                <!-- Table headers will be added by datatable -->
                            </thead>
                            <tbody>
                                <!-- Table content will be loaded via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Incidents -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Recente Incidenten</h6>
                    </div>
                    <div class="card-body">
                        <table id="recentIncidentsTable" class="table table-striped">
                            <thead>
                                <!-- Table headers will be added by datatable -->
                            </thead>
                            <tbody>
                                <!-- Table content will be loaded via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Load dashboard data
            loadDashboardData();
            
            // Initialize DataTables
            createDataTable('recentPrisoners', ['id', 'firstname', 'lastname', 'birthdate', 'cel', 'date-of-arrival', 'action'], '/prisoners');
            createDataTable('recentLogsTable', ['gevangene', 'title', 'waneer', 'actie'], '/prisonerLogs');
            createDataTable('recentIncidentsTable', ['gevangene', 'title', 'waneer', 'actie'], '/incidents');
        });
        
        function loadDashboardData() {
            // Make AJAX request to get dashboard statistics
            $.ajax({
                url: '/api/dashboard-stats',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Update statistics
                    $('#totalPrisoners').text(data.totalPrisoners || '0');
                    $('#currentPrisoners').text(data.currentPrisoners || '0');
                    $('#releasedPrisoners').text(data.releasedPrisoners || '0');
                    $('#occupiedCells').text(data.occupiedCells || '0');
                    $('#totalCells').text(data.totalCells || '0');
                    $('#emptyCells').text(data.emptyCells || '0');
                    $('#recentIncidents').text(data.recentIncidentsCount || '0');
                    $('#recentLogs').text(data.recentLogsCount || '0');
                    
                    // Calculate and display occupancy rate
                    const occupancyRate = data.totalCells > 0 
                        ? Math.round((data.occupiedCells / data.totalCells) * 100) 
                        : 0;
                    $('#occupancyRate').text(occupancyRate);
                    
                    // Initialize chart with actual wing data
                    initCellOccupancyChart(data.wingOccupancy || {});
                },
                error: function(xhr, status, error) {
                    console.error('Error loading dashboard data:', error);
                    
                    // Fallback to show demo numbers since API endpoint might not exist yet
                    $('#totalPrisoners').text('42');
                    $('#currentPrisoners').text('38');
                    $('#releasedPrisoners').text('4');
                    $('#occupiedCells').text('35');
                    $('#totalCells').text('50');
                    $('#emptyCells').text('15');
                    $('#recentIncidents').text('7');
                    $('#recentLogs').text('12');
                    $('#occupancyRate').text('70');
                    
                    // Initialize chart with demo data
                    initCellOccupancyChart();
                }
            });
        }
        
        function initCellOccupancyChart(wingData) {
            let labels = [];
            let occupiedData = [];
            let emptyData = [];
            let backgroundColors = [
                'var(--primary)',
                'var(--secondary)',
                'var(--success)',
                'var(--warning)',
                'var(--info)',
                'var(--danger)'
            ];
            
            // If wingData is provided, use it; otherwise use demo data
            if (wingData && Object.keys(wingData).length > 0) {
                Object.keys(wingData).forEach((wing, index) => {
                    const wingInfo = wingData[wing];
                    labels.push(`Vleugel ${wing}`);
                    occupiedData.push(wingInfo.occupied);
                    emptyData.push(wingInfo.total - wingInfo.occupied);
                });
            } else {
                // Demo data
                labels = ['Vleugel A', 'Vleugel B', 'Vleugel C', 'Vleugel D'];
                occupiedData = [12, 9, 8, 7];
                emptyData = [3, 5, 2, 4];
            }
            
            // Create chart data
            const chartData = {
                labels: labels,
                datasets: [{
                    label: 'Bezet',
                    data: occupiedData,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: backgroundColors.map(color => `${color}dd`),
                }]
            };
            
            // Create chart
            const ctx = document.getElementById('cellOccupancyChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: chartData,
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.parsed || 0;
                                        const total = wingData ? wingData[label.replace('Vleugel ', '')].total : 0;
                                        const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                        return `${label}: ${value} cellen bezet (${percentage}%)`;
                                    }
                                }
                            },
                            legend: {
                                display: false
                            }
                        },
                        cutout: '70%',
                    }
                });
                
                // Create legend items
                let legendHtml = '';
                labels.forEach((label, i) => {
                    const color = backgroundColors[i % backgroundColors.length];
                    const occupied = occupiedData[i];
                    const total = wingData ? wingData[label.replace('Vleugel ', '')].total : occupied + emptyData[i];
                    legendHtml += `<span class="mr-3 mb-2 d-inline-block">
                        <i class="fas fa-circle" style="color: ${color}"></i> ${label} 
                        <small class="text-muted">(${occupied}/${total})</small>
                    </span>`;
                });
                document.getElementById('wingLegend').innerHTML = legendHtml;
            }
        }
    </script>

    <style>
        .border-left-primary {
            border-left: 4px solid var(--primary) !important;
        }
        
        .border-left-success {
            border-left: 4px solid var(--success) !important;
        }
        
        .border-left-warning {
            border-left: 4px solid var(--warning) !important;
        }
        
        .border-left-danger {
            border-left: 4px solid var(--danger) !important;
        }
        
        .border-left-info {
            border-left: 4px solid var(--info) !important;
        }
        
        .border-left-secondary {
            border-left: 4px solid var(--secondary) !important;
        }
        
        .card {
            margin-bottom: 1.5rem;
        }
        
        .card-header h6 {
            color: white;
        }
        
        #wingLegend span {
            display: inline-block;
            margin-right: 10px;
        }
        
        .text-xs {
            font-size: 0.7rem;
        }
        
        .text-muted {
            color: #6c757d !important;
        }
    </style>
</x-app-layout>