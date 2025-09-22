<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap 5 - posun tabov s vysúvacím panelom</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Vertikálne taby na pravej strane so otočením */
            .vertical-tabs {
                position: fixed;
                top: 50%;
                right: 0;
                transform: translateY(-50%);
                display: flex;
                flex-direction: column;
                gap: 10px;
                z-index: 1050;
                align-items: flex-start; /* zarovnanie hore */
                padding: 10px;
                transition: transform 0.3s ease; /* pridáme pre plynulý posun */
            }

            /* Tab buttony - otočené o 90 stupňov, zarovnané naľavo */
            .vertical-tabs button {
                writing-mode: vertical-rl;
                transform: rotate(180deg);
                padding: 10px 15px;
                border: 1px solid #dee2e6;
                background: #f8f9fa;
                cursor: pointer;
                width: 40px;
                text-align: center;
                font-weight: 500;
                border-radius: 4px;
                transition: background 0.3s, border-color 0.3s;
            }

            /* Aktívny tab - zvýraznený */
            .vertical-tabs button.active {
                background-color: #0d6efd;
                color: #fff;
                border-color: #0d6efd;
            }

            /* Panel s vysúvacím obsahom */
            #slidePanel {
                position: fixed;
                top: 0;
                right: -400px; /* začína mimo obrazovku */
                width: 400px;
                height: 100%;
                background: #fff;
                box-shadow: -2px 0 5px rgba(0,0,0,0.3);
                transition: right 0.3s ease;
                z-index: 1040;
                padding: 20px;
                overflow-y: auto;
            }

            /* Panel otvorený */
            #slidePanel.open {
                right: 0;
            }
        </style>
    </head>
    <body>

    <!-- Vertikálne taby na pravej strane -->
    <div class="vertical-tabs" id="tabsContainer">
        <button data-content="content1" aria-label="Tab 1">Tab 1</button>
        <button data-content="content2" aria-label="Tab 2">Tab 2</button>
        <button data-content="content3" aria-label="Tab 3">Tab 3</button>
    </div>

    <!-- Vysúvací panel s obsahom -->
    <div id="slidePanel">
        <div id="content1" class="content-section" style="display:none;">
            <h4>Formulár</h4>
            <form>
                <div class="mb-3">
                    <label for="meno" class="form-label">Meno</label>
                    <input type="text" class="form-control" id="meno" placeholder="Zadajte meno" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Zadajte email" />
                </div>
                <button type="submit" class="btn btn-primary">Odoslať</button>
            </form>
        </div>
        <div id="content2" class="content-section" style="display:none;">
            <h4>Textový obsah</h4>
            <p>Tu môže byť nejaký text alebo informácie.</p>
        </div>
        <div id="content3" class="content-section" style="display:none;">
            <h4>Tabuľka</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Stĺpec 1</th>
                    <th>Stĺpec 2</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                </tr>
                <tr>
                    <td>Data 3</td>
                    <td>Data 4</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript na prepínanie a posun -->
    <script>
        const buttons = document.querySelectorAll('.vertical-tabs button');
        const panel = document.getElementById('slidePanel');
        const tabsContainer = document.getElementById('tabsContainer');

        // Funkcia na posun tabov
        function moveTabsLeft() {
            tabsContainer.style.transform = 'translateX(-400px)';
        }

        // Funkcia na vrátenie tabov
        function moveTabsRight() {
            tabsContainer.style.transform = 'translateX(0)';
        }

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const isActive = btn.classList.contains('active');

                if (isActive) {
                    // Ak je aktuálny aktívny, zatvoríme panel a posunieme taby späť
                    panel.classList.remove('open');
                    moveTabsRight();
                    // Odstránime aktívny štýl
                    buttons.forEach(b => b.classList.remove('active'));
                    return;
                }

                // Aktivujeme tento tab
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Otvoríme panel
                panel.classList.add('open');

                // Posunieme taby doľava
                moveTabsLeft();

                // Zmeniť obsah
                const contentId = btn.getAttribute('data-content');
                document.querySelectorAll('.content-section').forEach(sec => sec.style.display = 'none');
                const activeSection = document.getElementById(contentId);
                if (activeSection) {
                    activeSection.style.display = 'block';
                }
            });
        });

        // Pri zatvorení panelu sa taby vrátia
        // (Ak chceš, môžeš to spraviť aj pri iných udalostiach, napr. klik mimo)
        // Ale zatiaľ je to len pri kliknutí na aktívny tab (ktorý zatvára panel).
    </script>
    </body>
</html>
