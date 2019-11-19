# -*- coding: utf-8 -*-

from odoo import models, fields, api


class Activos(models.Model):
    _name = 'account.asset.marcas'

    name = fields.Char('Marca')
    image = fields.Binary('Imagen')


class Caracteristicas(models.Model):
    _name = 'account.asset.caracteristicas'

    name = fields.Char('Marca')
    estado = fields.Boolean('Estado', default=True)


class CaracteristicasLine(models.Model):
    _name = 'account.asset.caracteristicas_line'

    id_assets = fields.Many2one('account.asset.asset')
    name = fields.Many2one('account.asset.caracteristicas', string='Característica')
    descripcion = fields.Char('Valor')


class Sedes(models.Model):
    _name = 'educational.ubicaciones'

    name = fields.Char(string="Nombre de Ubicación")
    direccion = fields.Text(string="Dirección")


class Departamentos(models.Model):
    _name = 'educational.departamentos'

    def name_get(self):
        data = []
        for rec in self:
            name = 'Lugar: {} | Sede: {}'.format(rec.name, rec.sede.name)
            data.append((rec.id, name))
        return data

    name = fields.Char(string="Nombre")
    sede = fields.Many2one('educational.ubicaciones')




class Activos(models.Model):
    _inherit = 'account.asset.asset'

    marca = fields.Many2one('account.asset.marcas')
    modelo = fields.Char('Modelo')
    serie = fields.Char('Serie')
    custodio_actual = fields.Many2one('res.partner')
    custodio_anterior = fields.Many2one('res.partner')

    ubicacion = fields.Many2one('educational.departamentos')
    estado = fields.Selection([('FS', 'FUERA DE SERVICIO'),
                               ('BE', 'BUEN ESTADO'),
                               ('PB', 'PARA LA BAJA')],
                              string='Estado',
                              default='BE')
    observacion = fields.Text('Observación')

    line_caracteristicas = fields.One2many('account.asset.caracteristicas_line',
                                               'id_assets',
                                               string='Agregar características'
                                               )