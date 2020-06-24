# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ReportDetail(models.Model):
    _name = 'asset.report.detail'
    _description = 'Report Detail Model'
    reporting_person_id = fields.Many2one('hr.employee')
    reporting_id = fields.Many2one('asset.report')
    report_date = fields.Date()
    yearly_profit = fields.Float()
    monthly_profit = fields.Float()

  