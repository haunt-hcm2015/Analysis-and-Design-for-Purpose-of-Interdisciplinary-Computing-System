# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Project(models.Model):
    _name = 'accounting.project'
    _description = 'Accounting Project Model'
class ProjectSkillRequired(models.Model):
    _name = 'accounting.project.skill'
    _description = 'Accounting Project Skill Model'
class ProjectDocument(models.Model):
    _name = 'accounting.project.document'
    _description = 'Accounting Project Document Model'
class ProjectDocumentStandard(models.Model):
    _name = 'accounting.project.document.standard'
    _description = 'Accounting Project Document Standard Model'
class ProjectTime(models.Model):
    _name = 'accounting.project.time'
    _description = 'Accounting Project Time Model'
class ProjectProgressMilestone(models.Model):
    _name = 'accounting.project.progress.milestone'
    _description = 'Accounting Project Progress Milestone Model'
class ProjectMilestone(models.Model):
    _name = 'accounting.project.milestone'
    _description = 'Accounting Project Milestone Model'

    