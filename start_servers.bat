@echo on
SET startPort=8000
SET endPort=8003

FOR /L %%G IN (%startPort%,1,%endPort%) DO (
   START "PHP Server %%G" php -S localhost:%%G -t ./
   ECHO Servidor iniciado na porta %%G
)
