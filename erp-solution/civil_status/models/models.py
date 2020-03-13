# -*- coding: utf-8 -*-

# from odoo import models, fields, api


# class civil_status(models.Model):
#     _name = 'civil_status.civil_status'
#     _description = 'civil_status.civil_status'

#     name = fields.Char()
#     value = fields.Integer()
#     value2 = fields.Float(compute="_value_pc", store=True)
#     description = fields.Text()
#
#     @api.depends('value')
#     def _value_pc(self):
#         for record in self:
#             record.value2 = float(record.value) / 100
