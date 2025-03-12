<?php { ?>
    <footer>
        <p>Desenvolvido por AMAS. Projeto realizado com o apoio de organizações parceiras.</p>
        <p>Informações adicionais: projetoreflorescer@gmail.com.</p>
    </footer>

    
    <script>
        // Função para alternar entre modo claro e escuro
        function toggleMode() {
            const body = document.body;
            const currentMode = body.classList.contains('light-mode') ? 'light' : 'dark';

            // Alterna entre light-mode e dark-mode
            if (currentMode === 'light') {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark'); // Armazena a escolha do usuário
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                localStorage.setItem('theme', 'light'); // Armazena a escolha do usuário
            }
        }

        // Carrega a preferência do usuário armazenada no localStorage
        window.onload = function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.body.classList.remove('light-mode', 'dark-mode');
                document.body.classList.add(savedTheme + '-mode');
            }
        }
        </script>
</body>
</html>

<?php } ?>