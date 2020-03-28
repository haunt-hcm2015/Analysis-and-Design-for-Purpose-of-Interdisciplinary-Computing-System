# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Construction(models.Model):
    _name = 'accounting.construction'
    _description = 'Accounting Construction Model'
    product_tmpl_id = fields.Many2one('product.template', string="Product")
    product_id = fields.Many2one('product.product', string="Product Variant")
    product_qty = fields.Float(string="Quantity", required=True)
    component_line_ids = fields.One2many('construction.line', 'component_line_id', 'BoM Components')
class ConstructionLine(models.Model):
    _name = "construction.line"
    _description = "Construction Line Model"

    component_line_id = fields.Many2one('construction')
    product_id = fields.Many2one( 'product.product', 'Component', required=True)
    product_qty = fields.Float('Quantity', default=1.0, digits='Product Unit of Measure', required=True)
    volume = fields.Float('Volume')
    component_type = fields.Char(string="Type", readonly=True, compute="_compute_component_type")

    @api.depends('product_id')
    def _compute_component_type(self):
        for record in self:
            record.component_type = record.product_id.product_tmpl_id.component_type