# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Merchandise(models.TransientModel):
    _name = 'store.merchandise'
    _description = 'Merchandise model'
    merchandise_tmpl_id = fields.Many2one('product.template', string="Merchandise")
    merchandise_id = fields.Many2one('product.product', string="Merchandise Variant")
    unit = fields.Char('Unit')
    merchandise_qty = fields.Float(string="Quantity", required=True)
    image = fields.Image('Merchandise Image')
    merchandise_type_id = fields.Many2one(comodel_name='merchandise.type', string="Merchandise Type")

class MerchandiseType(models.TransientModel):
    _name = 'merchandise.type'
    _description = 'Merchandise Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Merchandise Type')



    

