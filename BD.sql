use cade_meu_pedido;

alter table t_empresa add column cod_entregador int ;

alter table t_empresa 
add foreign key (cod_entregador) 
references t_entregador(cod_entregador);

alter table t_entregador add column cod_pedido int;

alter table t_entregador
add foreign key (cod_pedido)
references t_pedido(cod_pedido);

alter table t_cliente add column cod_pedido int;

alter table t_cliente
add foreign key (cod_pedido)
references t_pedido(cod_pedido);

alter table t_pedido add column cod_cliente int;

alter table t_pedido
add foreign key (cod_cliente)
references t_cliente(cod_cliente);

alter table t_pedido add column cod_entregador int;

alter table t_pedido
add foreign key (cod_entregador)
references t_entregador(cod_entregador);