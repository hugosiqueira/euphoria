<?php $v->layout("_theme", ["title" => "Confirme e ative sua conta nos Projetos Orçamentários da Euphoria"]); ?>

<h2>Seja bem-vindo(a) ao sistema de Projetos Orçamentários da Euphoria <?= $first_name; ?>. Vamos começar a usar?</h2>
<p>Segue os dados para o seu primeiro acesso, você poderá alterar a sua senha no sistema.</p>
<p><strong>E-mail:</strong><?=$email;?><br/><strong>Senha:</strong><?=$password;?></p>
<p><a title='Confirmar Cadastro' href='<?= $login_link; ?>'>CLIQUE AQUI PARA ENTRAR</a></p>