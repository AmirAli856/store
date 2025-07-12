document.addEventListener("DOMContentLoaded", function () {
    const viewChart = document.getElementById('myChart').getContext('2d');
    const incomeChart = document.getElementById('incomeChart').getContext('2d');
    const salesCountChart = document.getElementById('salesCountChart').getContext('2d');

    const data = {
        labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
        datasets: [{
            label: 'بازدید سایت',
            data: [120, 150, 180, 130, 160, 140, 200, 220, 250, 300, 280, 350],
            backgroundColor: 'rgba(69, 177, 203, 0.2)',
            borderColor: 'rgba(69, 177, 203, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4,
        }]
    };


    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    ticks: {
                        font: {
                            family: 'Dana-Medium',
                            size: 12,
                            weight: 'bold',
                            style: 'normal',
                        }
                    },
                    title: {
                        font: {
                            family: 'Dana-Medium',
                            size: 14,
                            weight: 'bold',
                        }
                    }
                },
                y: {
                    ticks: {
                        font: {
                            family: 'Dana-Medium',
                            size: 12,
                            weight: 'bold',
                            style: 'normal',
                        }
                    },
                    title: {
                        font: {
                            family: 'Dana-Medium',
                            size: 14,
                            weight: 'bold',
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: 'Dana-Medium',
                            size: 14,
                            weight: 'bold',
                        }
                    }
                }
            }
        }
    };

    const myChart = new Chart(viewChart, config);
    const incomeChart1 = new Chart(incomeChart, config);
    const incomeChart2 = new Chart(salesCountChart, config);
});



document.getElementById("download-pdf").addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const canvas = document.getElementById('myChart');

    const imgData = canvas.toDataURL("image/png");


    const pdfWidth = doc.internal.pageSize.getWidth();
    const pdfHeight = doc.internal.pageSize.getHeight();

    doc.addImage(imgData, 'PNG', 10, 10, pdfWidth - 20, (pdfHeight - 20) * 0.6);


    doc.save("chart.pdf");
});


document.getElementById("download-excel").addEventListener("click", function () {
    const data = [
        ['ماه', 'بازدید سایت'],
        ['فروردین', 120],
        ['اردیبهشت', 150],
        ['خرداد', 180],
        ['تیر', 130],
        ['مرداد', 160],
        ['شهریور', 140],
        ['مهر', 200],
        ['آبان', 220],
        ['آذر', 250],
        ['دی', 300],
        ['بهمن', 280],
        ['اسفند', 350]
    ];

    const ws = XLSX.utils.aoa_to_sheet(data);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "نمودار");

    XLSX.writeFile(wb, "chart-data.xlsx");
});
