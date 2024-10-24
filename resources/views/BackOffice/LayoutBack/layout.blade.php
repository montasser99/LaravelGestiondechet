<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
          content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('back content/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="{{ asset('back content/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ asset('back content/index.html') }}">
                <span class="align-middle">AdminKit</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <!-- Dashboard link with dynamic "active" class -->
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <!-- Evenement link with dynamic "active" class -->
                @if (Auth::user()->role=="Responsable_Centre" || Auth::user()->role=="Responsable_Entreprise")
                <li class="sidebar-item {{ request()->routeIs('evenement.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('evenement.index') }}">
                        <i class="align-middle" data-feather="calendar"></i>
                        <span class="align-middle">Evenement</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role=="user")

                <li class="sidebar-item {{ request()->routeIs('annoncedechets.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('annoncedechets.index') }}">
                        <i class="align-middle" data-feather="package"></i>
                        <span class="align-middle">Annonce de déchet</span>
                    </a>
                </li>

                @endif
                
                @if (Auth::user()->role=="user")
                <li class="sidebar-item {{ request()->routeIs('paymentdechet.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('paymentdechet.index') }}">
                        <i class="align-middle" data-feather="dollar-sign"></i>
                        <span class="align-middle">Liste de paiement</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role=="Responsable_Centre" || Auth::user()->role=="Responsable_Entreprise")
                <li class="sidebar-item {{ request()->routeIs('historique.paiements') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('historique.paiements') }}">
                        <i class="align-middle" data-feather="archive"></i>
                        <span class="align-middle">historique paiements</span>
                    </a>
                </li>
                @endif
                
                @if (Auth::user()->role=="admin")

                <!-- Users link with dynamic "active" class -->
                <li class="sidebar-item {{ request()->routeIs('usersA.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('usersA.index') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Utilisateurs à Vérifier</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role=="Responsable_Centre" || Auth::user()->role=="admin")

                <li class="sidebar-item {{ request()->routeIs('centres.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('centres.index') }}">
                        <i class="align-middle" data-feather="refresh-cw"></i>
                        <span class="align-middle">Gestion Des Centres</span>
                    </a>
                </li>

                @endif

                @if (Auth::user()->role=="Responsable_Centre")

                <li class="sidebar-item {{ request()->routeIs('contractsRoute') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('contractsRoute') }}">
                        <i class="align-middle" data-feather="refresh-cw"></i>
                        <span class="align-middle">Centre contracts</span>
                    </a>
                </li>

                @endif

                @if (Auth::user()->role=="admin")
           
                <li class="sidebar-item {{ request()->routeIs('planabonnement.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('planabonnement.index') }}">
                        <i class="align-middle" data-feather="layers"></i>
                        <span class="align-middle">Plan Abonnement</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('abonnement.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('abonnement.index') }}">
                        <i class="align-middle" data-feather="credit-card"></i>
                        <span class="align-middle">Users Abonnement</span>
                    </a>
                </li>

                @endif

            </ul>
        </div>
    </nav>


    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                           data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                           data-bs-toggle="dropdown">
                            <img src="{{ asset('back content/img/avatars/avatar.jpg') }}"
                                 class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span
                                class="text-dark">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{route('FrontHome')}}">Home</a>

                            <!-- Lien de déconnexion avec un formulaire -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </a>

                            <!-- Formulaire de déconnexion -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">
            @yield('content')
        </main>

        @include('BackOffice.LayoutBack.footer')

    </div>
</div>

<script src="{{ asset('back content/js/app.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                    "Dec"
                ],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        2115,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                    "Dec"
                ],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var markers = [{
            coords: [31.230391, 121.473701],
            name: "Shanghai"
        },
            {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            },
            {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            },
            {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            },
            {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            },
            {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            },
            {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            },
            {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            },
            {
                coords: [51.507351, -0.127758],
                name: "London"
            },
            {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }
        ];
        var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
                initial: {
                    r: 9,
                    strokeWidth: 7,
                    stokeOpacity: .4,
                    fill: window.theme.primary
                },
                hover: {
                    fill: window.theme.primary,
                    stroke: window.theme.primary
                }
            },
            zoomOnScroll: false
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });
</script>

</body>

</html>
